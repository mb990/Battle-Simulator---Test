<?php


namespace App\Services;


use App\Repositories\GameRepository;

class GameService
{
    protected $game;

    /**
     * GameService constructor.
     * @param GameRepository $game
     */
    public function __construct(GameRepository $game)
    {
        $this->game = $game;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->game->all();
    }

    /**
     * @param int $id
     * @return \App\Models\Game
     */
    public function find(int $id): \App\Models\Game
    {
        return $this->game->find($id);
    }

    /**
     * @param $request
     * @return \App\Models\Game
     */
    public function store($request): \App\Models\Game
    {
        return $this->game->store($request);
    }
}
