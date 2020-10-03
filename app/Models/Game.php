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
     * @return Collection
     */
    public function armiesInOrderForAttack(): Collection
    {
        return $this->armies()
            ->orderBy('created_at', 'asc')
            ->get();
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
     * @return Army
     */
    public function weakestArmy(Army $attackingArmy): Army
    {
        return $this->armies->where('id', '!==', $attackingArmy->id)
            ->where('units', '>', 0)
            ->SortBy('units')
            ->first();
    }

    /**
     * @param Army $attackingArmy
     * @return Army
     */
    public function strongestArmy(Army $attackingArmy): Army
    {
        return $this->armies->where('id', '!==', $attackingArmy->id)
            ->where('units', '>', 0)
            ->sortByDesc('units')
            ->first();
    }

    /**
     * @param Army $attackingArmy
     * @return Army
     */
    public function randomArmy(Army $attackingArmy): Army
    {
        return $this->armies->where('id', '!==', $attackingArmy->id)
            ->where('units', '>', 0)
            ->shuffle()
            ->first();
    }
}
