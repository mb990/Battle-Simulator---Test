<?php


namespace App\Services;


use App\Repositories\AttackStrategyRepository;

class AttackStrategyService
{
    /**
     * @var AttackStrategyRepository
     */
    private $attackStrategy;

    /**
     * AttackStrategyService constructor.
     * @param AttackStrategyRepository $attackStrategy
     */
    public function __construct(AttackStrategyRepository $attackStrategy)
    {
        $this->attackStrategy = $attackStrategy;
    }

    /**
     * @return \App\Models\AttackStrategy[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->attackStrategy->all();
    }
}
