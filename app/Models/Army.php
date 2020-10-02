<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Army extends Model
{
    use HasFactory;

    protected $fillable = [
      'name', 'units', 'attack_strategy_id', 'game_id'
    ];

    protected $with = ['attackStrategy', 'game'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function attackStrategy()
    {
        return $this->belongsTo(AttackStrategy::class);
    }
}
