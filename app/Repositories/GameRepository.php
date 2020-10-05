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
     * @return Collection
     */
    public function activeGames(): Collection
    {
        return $this->model->where('active', 1)
            ->get();
    }

    /**
     * @param int $id
     * @return Game
     */
    public function find(int $id): Game
    {
        return $this->model->findOrFail($id);
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

    /**
     * @param $request
     * @return mixed
     */
    public function update($request, $game)
    {
        return $game->update(['active' => $request['active']]);
    }
}
