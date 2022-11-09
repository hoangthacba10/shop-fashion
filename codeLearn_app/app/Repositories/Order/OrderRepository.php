<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface{

	/**
	 *
	 * @return mixed
	 */
	function getModel() {
        return Order::class;
	}

    public function getOrderByUserId($userId) {
        return $this->model->where('user_id', $userId)->get();
    }
}
