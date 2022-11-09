<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface{

	/**
	 *
	 * @return mixed
	 */
	function getModel() {
        return User::class;
	}
}
