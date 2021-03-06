<?php

namespace App\Http\Controllers;

use App\Services\AttackStrategyService;
use App\Services\GameService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * @var GameService
     */
    private $gameService;
    /**
     * @var AttackStrategyService
     */
    private $attackStrategyService;

    /**
     * GameController constructor.
     * @param GameService $gameService
     * @param AttackStrategyService $attackStrategyService
     */
    public function __construct(GameService $gameService, AttackStrategyService $attackStrategyService)
    {
        $this->gameService = $gameService;
        $this->attackStrategyService = $attackStrategyService;
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $game = $this->gameService->find($id);

        $attackStrategies = $this->attackStrategyService->all();

        $nextArmyToAttack = $game->armiesInOrderForAttack()->first();

        return view('single-game', compact(['game', 'attackStrategies', 'nextArmyToAttack']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $game = $this->gameService->store($request);

        $url = route('game.show', $game->id);

        return response()->json(['game' => $game, 'url' => $url]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $this->gameService->update($request, $id);

        return response()->json(['success' => 'game updated']);
    }
}
