<?php

namespace App\Http\Controllers\Front;

use App\Utilities\Constant;
use App\Utilities\VNPay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;

class CheckOutController extends Controller
{
    private $orderService;
    private $orderDetailService;
    public function __construct(OrderServiceInterface $orderService, OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }
    public function index() {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request) {
        // 01. thêm đơn hàng
        $data = $request->all();
        $data['status'] = Constant::order_status_ReceiveOrders;
        $order = $this->orderService->create($data);
        // 02. thêm chi tiết đơn hàng
        $carts = Cart::content();

        foreach($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->price * $cart->qty,
            ];

            $this->orderDetailService->create($data);
        }

        if($request->payment_type == 'pay_later') {
            // 03. gửi email
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendEmail($order, $total, $subtotal);

            // 04. xóa giỏ hàng
            Cart::destroy();
            // 05. trả về thông báo
            return redirect('checkout/result')
            ->with('notification', 'Success! you will pay on delivery. Please check your email!');
        }

        if($request->payment_type == 'online_payment') {
            //01. lấy url thanh toán VNPay
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->id, // ID của đơn hàng
                'vnp_OrderInfo' => 'hàng xịn', // mô tả đơn hàng
                'vnp_Amount' => Cart::total(0, '', '') * 23070, //tổng giá của đơn hàng
            ]);
            //02. chuyển hướng tới URL lấy được
            return redirect()->to($data_url);
        }
    }

    public function result() {
        $notification = session('notification');

        return view('front.checkout.result', compact('notification'));
    }

    public function vnPayCheck(Request $request) {
        //01. lấy data từ url (do VNPay gửi về qua $vnp_Returnurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); // mã phản hồi kết quả thanh toán. 00 = thành công
        $vnp_TxnRef = $request->get('vnp_TxnRef'); // order_id
        $vnp_Amount = $request->get('vnp_Amount'); // số tiền thanh toán

        //02. kiểm tra data, xem kết quả giao dịch trả về từ VNPay có hợp lệ không.
        if($vnp_ResponseCode != null) {
            // nếu thành công
            if($vnp_ResponseCode == 00) {
                // cập nhật trạng thái Order
                $this->orderService->update([
                    'status' => Constant::order_status_Paid,
                ], $vnp_TxnRef);

                // gửi email
                $order = $this->orderService->find($vnp_TxnRef); // order_id
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this->sendEmail($order, $total, $subtotal);

                // xóa giỏ hàng
                Cart::destroy();

                // thông báo kết quả
                return redirect('checkout/result')
            ->with('notification', 'success! Has paid online. Please check your email');
            } else {
                // nếu không thành công
                //xóa đơn hàng đã thêm vào database
                $this->orderService->delete($vnp_TxnRef);

                //trả về thông báo lỗi
                return redirect('checkout/result')
            ->with('notification', 'error: Payment failed or canceled.');
            }
        }
    }

    private function sendEmail($order, $total, $subtotal) {
        $email_to = $order->email;

        Mail::send('front.checkout.email', compact('order', 'total', 'subtotal'), function($message) use($email_to) {
            $message->from('hoangpc1208@gmail.com', 'CodeLearn eCommerce');
            $message->to($email_to, $email_to);
            $message->subject('order notification');
        });
    }
}
