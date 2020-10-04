<?php

namespace App\Http\Controllers;

use App\Services\ArmyService;
use App\Services\AttackService;
use Illuminate\Http\Request;

class AttackController extends Controller
{
    /**
     * @var AttackService
     */
    private $attackService;
    /**
     * @var ArmyService
     */
    private $armyService;

    /**
     * AttackController constructor.
     * @param AttackService $attackService
     * @param ArmyService $armyService
     */
    public function __construct(AttackService $attackService, ArmyService $armyService)
    {
        $this->attackService = $attackService;
        $this->armyService = $armyService;
    }

    /**
     * @param $attackingArmyId
     * @return \Illuminate\Http\JsonResponse
     */
    public function start($attackingArmyId): \Illuminate\Http\JsonResponse
    {
        $data = $this->attackService->start($this->armyService->find($attackingArmyId));

        return response()->json(['data' => $data]);
    }
}
