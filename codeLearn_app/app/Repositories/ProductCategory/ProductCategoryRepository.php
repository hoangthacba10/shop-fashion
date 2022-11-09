<?php

namespace App\Repositories\ProductCategory;

use App\Models\ProductCategory;
use App\Repositories\BaseRepository;
use App\Repositories\ProductCategory\ProductCategoryRepositoryInterface;

class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface{

	/**
	 *
	 * @return mixed
	 */
	function getModel() {
        return ProductCategory::class;
	}
}
