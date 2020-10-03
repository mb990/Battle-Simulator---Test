<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'active'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function armies()
    {
        return $this->hasMany(Army::class);
    }

    /**
     * @param Army $attackingArmy
     * @return Collection
     */
    public function attackableArmies(Army $attackingArmy): Collection
    {
        return $this->armies->where('id', '!==', $attackingArmy->id)
            ->where('units', '>', 0)
            ->get();
    }

    /**
     * @param Army $attackingArmy
     * @return mixed
     */
    public function weakestArmy(Army $attackingArmy)
    {
        return $this->armies->where('id', '!==', $attackingArmy->id)
            ->where('units', '>', 0)
            ->min('units');
    }

    /**
     * @param Army $attackingArmy
     * @return mixed
     */
    public function strongestArmy(Army $attackingArmy)
    {
        return $this->armies->where('id', '!==', $attackingArmy->id)
            ->where('units', '>', 0)
            ->max('units');
    }

    /**
     * @param Army $attackingArmy
     * @return Army
     */
    public function randomArmy(Army $attackingArmy): Army
    {
        return $this->armies->where('id', '!==', $attackingArmy->id)
            ->where('units', '>', 0)
            ->inRandomOrder()
            ->first();
    }
}
