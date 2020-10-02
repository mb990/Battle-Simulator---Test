<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttackStrategy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function Armies()
    {
        return $this->hasMany(Army::class);
    }
}
