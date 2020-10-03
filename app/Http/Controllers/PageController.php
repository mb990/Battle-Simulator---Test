<?php

namespace App\Http\Controllers;

use App\Services\GameService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @var GameService
     */
    private $gameService;

    /**
     * PageController constructor.
     * @param GameService $gameService
     */
    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $games = $this->gameService->all();

        $activeGamesLimit = $this->gameService->activeGamesLimitReached();

        return view('home', compact(['games', 'activeGamesLimit']));
    }
}
