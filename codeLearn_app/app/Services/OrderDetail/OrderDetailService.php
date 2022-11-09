<?php

namespace App\Services\OrderDetail;

use App\Services\BaseService;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;

class OrderDetailService extends BaseService implements OrderDetailServiceInterface{
    public $repository;

    /**
     */
    function __construct(OrderDetailRepositoryInterface $orderDetailRepository) {
        $this->repository = $orderDetailRepository;
    }
}
