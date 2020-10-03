<?php


namespace App\Services;


use App\Repositories\GameRepository;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * @param $request
     * @return mixed
     */
    public function update($request)
    {
        return $this->game->update($request);
    }

    /**
     * @return Collection
     */
    public function numberOfActiveGames(): Collection
    {
        return $this->game->numberOfActiveGames();
    }

    public function activeGamesLimitReached()
    {
        if ($this->numberOfActiveGames()->count() > 4) {

            return true;
        }

        return false;
    }
}
