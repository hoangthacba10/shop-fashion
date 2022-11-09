<?php

namespace App\Repositories\OrderDetail;

use App\Models\OrderDetail;
use App\Repositories\BaseRepository;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface{

	/**
	 *
	 * @return mixed
	 */
	function getModel() {
        return OrderDetail::class;
	}
}
