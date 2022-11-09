<?php

namespace App\Repositories\Product;
use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface{
    public function getRelatedProducts($product, $limit = 4);

    public function getFeaturedProductsByCategory(int $categoryId);

    public function getProductIndex($request);

    public function getProductsByCategory($categoryName, $request);
}
