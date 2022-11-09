<?php

namespace App\Repositories\Brand;

use App\Models\Brand;
use App\Repositories\BaseRepository;
use App\Repositories\Brand\BrandRepositoryInterface;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface{

	/**
	 *
	 * @return mixed
	 */
	function getModel() {
        return Brand::class;
	}
}
