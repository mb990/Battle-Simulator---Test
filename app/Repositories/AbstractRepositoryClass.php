<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;

abstract class AbstractRepositoryClass
{

    /**
     * @var
     */
    protected $model;

    /**
     * @return Collection
     */
    abstract public function all(): Collection;

    /**
     * @param int $id
     * @return mixed
     */
    abstract public function find(int $id);

    /**
     * @param $request
     * @return mixed
     */
    abstract public function store($request);

}
