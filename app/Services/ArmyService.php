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
     * @param $id
     * @return \App\Models\Army
     */
    public function find($id): \App\Models\Army
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
        return $this->army->update($request->all());
    }

    /**
     * @param $unitsLost
     * @param Army $army
     */
    public function updateUnits($newUnitsAmount, Army $army)
    {
        return $this->army->updateUnits($newUnitsAmount, $army);
    }

    /**
     * @param Army $attackedArmy
     * @param float $damage
     * @return int
     */
    public function calculateRemainingUnits(Army $attackedArmy, float $damage): int
    {
        $lostUnits = $this->calculateLostUnits($damage);

        $remainingUnits = $attackedArmy->units - $lostUnits;

        return $remainingUnits;
    }

    /**
     * @param Army $army
     * @return bool
     */
    public function armyHasOneUnit(Army $army): bool
    {
        if ($army->units === 1) {

            return true;
        }

        return false;
    }

    /**
     * @param float $damage
     * @return int
     */
    public function calculateLostUnits(float $damage): int
    {
        $lostUnits = intval(floor($damage));
        return $lostUnits;
    }
}
