<?php


namespace App\Repositories;


use App\Models\Game;
use Illuminate\Database\Eloquent\Collection;

class GameRepository extends BaseRepository
{
    /**
     * GameRepository constructor.
     * @param Game $game
     */
    public function __construct(Game $game)
    {
        parent::__construct($game);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return Game
     */
    public function find(int $id): Game
    {
        return $this->model->find($id);
    }

    /**
     * @param $request
     * @return Game
     */
    public function store($request): Game
    {
        return $this->model->create($request->all());
    }

    /**
     * @return Collection
     */
    public function numberOfActiveGames(): Collection
    {
        return $this->model->where('active', true)
            ->get();
    }
}
