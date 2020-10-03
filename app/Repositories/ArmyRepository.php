<?php


namespace App\Repositories;


use App\Models\Army;
use Illuminate\Database\Eloquent\Collection;

class ArmyRepository extends BaseRepository
{
    /**
     * ArmyRepository constructor.
     * @param Army $army
     */
    public function __construct(Army $army)
    {
        parent::__construct($army);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return Army
     */
    public function find(int $id): Army
    {
        return $this->model->find($id);
    }

    /**
     * @param $request
     * @return Army
     */
    public function store($request): Army
    {
        return $this->model->create($request->all());
    }

    /**
     * @param $request
     * @return mixed
     */
    public function update($request)
    {
        return $this->model->update($request->all());
    }

    /**
     * @param $units
     * @param Army $army
     * @return Army
     */
    public function updateUnits($units, Army $army): Army
    {
        $army->update(['units' => $units]);

        return $this->find($army->id);
    }
}
