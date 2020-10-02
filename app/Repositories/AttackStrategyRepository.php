<?php


namespace App\Repositories;


use App\Models\AttackStrategy;
use Illuminate\Database\Eloquent\Collection;

class AttackStrategyRepository
{
    /**
     * @var AttackStrategy
     */
    private $attackStrategy;

    /**
     * AttackStrategyRepository constructor.
     * @param AttackStrategy $attackStrategy
     */
    public function __construct(AttackStrategy $attackStrategy)
    {
        $this->attackStrategy = $attackStrategy;
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->attackStrategy->all();
    }
}
