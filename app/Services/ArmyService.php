<?php


namespace App\Services;


use App\Models\Army;
use App\Repositories\ArmyRepository;

class ArmyService
{
    /**
     * @var ArmyRepository
     */
    private $army;

    /**
     * ArmyService constructor.
     * @param ArmyRepository $army
     */
    public function __construct(ArmyRepository $army)
    {
        $this->army = $army;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->army->all();
    }

    /**
     * @param int $id
     * @return \App\Models\Army
     */
    public function find(int $id): \App\Models\Army
    {
        return $this->army->find($id);
    }

    /**
     * @param $request
     * @return \App\Models\Army
     */
    public function store($request): \App\Models\Army
    {
        return $this->army->store($request);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function update($request)
    {
        return $this->army->update($request);
    }
}
