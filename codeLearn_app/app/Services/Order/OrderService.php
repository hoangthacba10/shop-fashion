<?php

namespace App\Services\Order;

use App\Services\BaseService;
use App\Services\Order\OrderServiceInterface;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderService extends BaseService implements OrderServiceInterface{
    public $repository;

    /**
     */
    public function __construct(OrderRepositoryInterface $orderRepository) {
        $this->repository = $orderRepository;
    }
	/**
	 *
	 * @param mixed $userId
	 *
	 * @return mixed
	 */
	function getOrderByUserId($userId) {
        return $this->repository->getOrderByUserId($userId);
	}
}
