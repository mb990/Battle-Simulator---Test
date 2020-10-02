<?php

namespace Database\Seeders;

use App\Models\AttackStrategy;
use Illuminate\Database\Seeder;

class AttackStrategiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $strategies = [
            'random', 'weakest', 'strongest'
        ];

        foreach ($strategies as $strategy) {

            $attackStrategy = new AttackStrategy();

            $attackStrategy->name = $strategy;

            $attackStrategy->save();
        }
    }
}
