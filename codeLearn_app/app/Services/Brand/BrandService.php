<?php

namespace App\Services\Brand;

use App\Services\BaseService;
use App\Services\Brand\BrandServiceInterface;
use App\Repositories\Brand\BrandRepositoryInterface;

class BrandService extends BaseService implements BrandServiceInterface{
    public $repository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->repository = $brandRepository;
    }
}
