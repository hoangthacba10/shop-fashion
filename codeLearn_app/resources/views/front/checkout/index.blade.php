@extends('front.layout.master')
@section('title', 'Checkout')

@section('body')
    <!-- Breadcrumb section begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="shop.html">Shop</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb section end -->
    <!-- Shopping cart section begin -->
    <div class="checkout-section spad">
        <div class="container">
            <form action="" method="POST" class="checkout-form">
                @csrf
                <div class="row">
                    @if (Cart::count() > 0)
                        <div class="col-lg-6">
                            <div class="checkout-content">
                                <a href="login.html" class="content-btn">click here to login</a>
                            </div>
                            <h4>Billing details</h4>
                            <div class="row">
                                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id ?? '' }}">

                                <div class="col-lg-6">
                                    <label for="fir">First name <span>*</span></label>
                                    <input type="text" id="fir" name="first_name" value="{{ Auth::user()->name ?? '' }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="last">Last name <span>*</span></label>
                                    <input type="text" id="last" name="last_name">
                                </div>

                                <div class="col-lg-12">
                                    <label for="cun-name">Company name</label>
                                    <input type="text" id="cun-name" name="company_name" value="{{ Auth::user()->company_name ?? '' }}">
                                </div>

                                <div class="col-lg-12">
                                    <label for="cun">Country <span>*</span></label>
                                    <input type="text" id="cun" name="country" value="{{ Auth::user()->country ?? '' }}">
                                </div>

                                <div class="col-lg-12">
                                    <label for="street">Street address <span>*</span></label>
                                    <input type="text" id="street" class="street-first" name="street_address" value="{{ Auth::user()->street_address ?? '' }}">
                                </div>

                                <div class="col-lg-12">
                                    <label for="zip">Postcode / zip (optional)</label>
                                    <input type="text" id="zip" name="postcode_zip" value="{{ Auth::user()->post_zip ?? '' }}">
                                </div>

                                <div class="col-lg-12">
                                    <label for="town">Town / city <span>*</span></label>
                                    <input type="text" id="town" name="town_city" value="{{ Auth::user()->town_city ?? '' }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="email">Email address <span>*</span></label>
                                    <input type="text" id="email" name="email" value="{{ Auth::user()->email ?? '' }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="phone">Phone <span>*</span></label>
                                    <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone ?? '' }}">
                                </div>

                                <div class="col-lg-12">
                                    <div class="create-item">
                                        <label for="acc-create">
                                            Create an account
                                            <input type="checkbox" id="acc-create">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout-content">
                                <input type="text" placeholder="enter your coupon code">
                            </div>

                            <div class="place-order">
                                <h4>Your order</h4>
                                <div class="order-total">
                                    <ul class="order-table">
                                        <li>Product <span>Total</span></li>

                                        @foreach ($carts as $cart)
                                            <li class="fw-normal">
                                                {{ $cart->name }} x {{ $cart->qty }}
                                                <span>${{ $cart->price * $cart->qty }}</span>
                                            </li>
                                        @endforeach

                                        <li class="fw-normal">Subtotal <span>${{ $subtotal }}</span></li>
                                        <li class="total-price">Total <span>${{ $total }}</span></li>
                                    </ul>

                                    <div class="payment-check">
                                        <div class="pc-item">
                                            <label for="pc-check">
                                                Pay later
                                                <input type="radio" name="payment_type" value="pay_later" id="pc-check" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="pc-item">
                                            <label for="pc-paypal">
                                                Online payment
                                                <input type="radio" name="payment_type" value="online_pay" id="pc-paypal">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="order-btn">
                                        <button type="submit" class="site-btn place-btn">Place order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12">
                            <h4>Your cart is empty.</h4>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <!-- Shopping cart section end -->
@endsection
