<?php

namespace App\Http\Controllers;

use App\Models\Army;
use App\Services\ArmyService;
use Illuminate\Http\Request;

class ArmyController extends Controller
{
    /**
     * @var ArmyService
     */
    private $armyService;

    /**
     * ArmyController constructor.
     * @param ArmyService $armyService
     */
    public function __construct(ArmyService $armyService)
    {

        $this->armyService = $armyService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $army = $this->armyService->find($this->armyService->store($request)->id);

        return response()->json(['army' => $army]);
    }
}
