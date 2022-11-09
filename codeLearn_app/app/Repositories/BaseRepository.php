<?php

namespace App\Repositories;

abstract class BaseRepository implements RepositoryInterface{
    protected $model;
    public function __construct()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    abstract public function getModel();
	/**
	 *
	 * @return mixed
	 */
	function all() {
        return $this->model->all();
	}

	/**
	 *
	 * @param int $id
	 *
	 * @return mixed
	 */
	function find(int $id) {
        return $this->model->findOrFail($id);
	}

	/**
	 *
	 * @param array $data
	 *
	 * @return mixed
	 */
	function create(array $data) {
        return $this->model->create($data);
	}

	/**
	 *
	 * @param array $data
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	function update(array $data, $id) {
        $object = $this->model->find($id);

        return $object->update($data);
	}

	/**
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	function delete($id) {
        $object = $this->model->find($id);

        return $object->delete();
	}

    public function searchAndPaginate($searchBy, $keyword, $perPage = 5) {
        return $this->model
            ->where($searchBy, 'like', '%' . $keyword . '%')
            ->orderBy('id', 'desc')
            ->paginate($perPage)
            ->appends(['search' => $keyword]);
    }
}
