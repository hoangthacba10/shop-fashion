<?php

namespace App\Services;

class BaseService implements ServiceInterface{
    public $repository;
	/**
	 *
	 * @return mixed
	 */
	public function all() {
        return $this->repository->all();
	}

	/**
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function find($id) {
        return $this->repository->find($id);
	}

	/**
	 *
	 * @param array $data
	 *
	 * @return mixed
	 */
	public function create(array $data) {
        return $this->repository->create($data);
	}

	/**
	 *
	 * @param array $data
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function update(array $data, $id) {
        return $this->repository->update($data, $id);
	}

	/**
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function delete($id) {
        return $this->repository->delete($id);
	}

    public function searchAndPaginate($searchBy, $keyword, $perPage = 5) {
        return $this->repository->searchAndPaginate($searchBy, $keyword, $perPage);
    }
}
