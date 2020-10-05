<?php


namespace App\Services;


use App\Models\Game;
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

    public function activeGames()
    {
        return $this->game->activeGames();
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
    public function update($request, $id)
    {
        $game = $this->find($id);

        return $this->game->update($request->all(), $game);
    }

    /**
     * @return Collection
     */
    public function numberOfActiveGames(): Collection
    {
        return $this->game->numberOfActiveGames();
    }

    /**
     * @return bool
     */
    public function activeGamesLimitReached(): bool
    {
        if ($this->numberOfActiveGames()->count() > 4) {

            return true;
        }

        return false;
    }
}
