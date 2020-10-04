<?php


namespace App\Services;


use App\Models\Army;
use App\Models\Game;
use Carbon\Carbon;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class AttackService
{
    /**
     * @var ArmyService
     */
    private $armyService;

    /**
     * AttackService constructor.
     * @param ArmyService $armyService
     */
    public function __construct(ArmyService $armyService)
    {
        $this->armyService = $armyService;
    }

    public function start(Army $attackingArmy)
    {
        if (!$this->battleIsOver($attackingArmy->game->armies)) {

            $data = [];

            $data['attackedArmy'] = $this->pickAttackedArmy($attackingArmy);

            if ($this->isAttackSuccessful($attackingArmy)) {

                $data['success'] = true;

                $data['damage'] = $this->dealDamage($attackingArmy);

                $this->armyService->updateUnits($this->armyService->calculateRemainingUnits($data['attackedArmy'], $data['damage']), $data['attackedArmy']);

                $data['lost_units'] = $this->armyService->calculateLostUnits($data['damage']);
            }

            else {

                $data['success'] = false;
            }

            $data['attackingArmy'] = $attackingArmy;

            return $data;
        }

        return $this->gameOverProtocol($attackingArmy);
    }

    public function autorunBattle($armies)
    {
        foreach ($armies as $army) {

            $this->start($army);
        }
    }

    /**
     * @param $numberOfUnits
     * @return float|int
     */
    public function successChance($numberOfUnits)
    {
        $chance = $numberOfUnits * 1;

        return $chance;
    }

    /**
     * @param Army $army
     * @return bool
     */
    public function isAttackSuccessful(Army $army): bool
    {
        $randomNumber = rand(1, 100);

        if ($randomNumber < $this->successChance($army->units)) {

            return true;
        }

        return false;
    }

    /**
     * @param Army $army
     * @return float|int
     */
    public function damageDealt(Army $army)
    {
        if ($this->increasedDamage($army)) {

            $damageDealt = $army->units * 1;

            return $damageDealt;
        }

        $damageDealt = $army->units * 0.5;

        return $damageDealt;
    }

    /**
     * @param Army $army
     * @return bool
     */
    public function increasedDamage(Army $army): bool
    {
        if ($this->armyService->armyHasOneUnit($army)) {

            return true;
        }

        return false;
    }

    /**
     * @param Army $army
     * @return float
     */
    public function setReloadTime(Army $army): float
    {
        $reloadTime = $army->units * 0.01;

        return $reloadTime;
    }

    /**
     * @param Army $army
     */
    public function reload(Army $army): void
    {
        $reloadTime = $this->setReloadTime($army);

        usleep($reloadTime * 10 * 1000); // centiseconds to milliseconds to microseconds
    }

    /**
     * @param Army $attackingArmy
     * @param Game $game
     * @return Army
     */
    public function pickAttackedArmy(Army $attackingArmy)
    {
        if ($attackingArmy->attackStrategy->name === 'random') {

           $attackedArmy = $attackingArmy->game->randomArmy($attackingArmy);

           return $attackedArmy;
        }

        if ($attackingArmy->attackStrategy->name === 'weakest') {

            $attackedArmy = $attackingArmy->game->weakestArmy($attackingArmy);

            return $attackedArmy;
        }

        $attackedArmy = $attackingArmy->game->strongestArmy($attackingArmy);

        return $attackedArmy;
    }

    /**
     * @param Army $attackingArmy
     * @return float|int
     */
    public function dealDamage(Army $attackingArmy)
    {
        $damage = 0;

        for ($i=0; $i < $attackingArmy->units; $i++) {

            $this->reload($attackingArmy);
        }

        $damage += $this->damageDealt($attackingArmy);

        return $damage;
    }

    /**
     * @param $armies
     * @return bool
     */
    public function battleIsOver($armies): bool
    {
        $armiesWithUnits = [];

        foreach ($armies as $army) {

            if ($army->units > 0) {

                $armiesWithUnits[] = $army;

                if (count($armiesWithUnits) > 1) {

                    return false;
                }
            }
        }

        return true;
    }

    /**
     * @param Army $army
     * @return array
     */
    public function gameOverProtocol(Army $army): array
    {
        $data = [];

        $data['game_over'] = true;

        $data['victorious_army'] = $army;

        return $data;
    }
}
