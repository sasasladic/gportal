<?php

namespace App\Http\Controllers\API;

use App\Game;
use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Http\Resources\Games;
use App\Repositories\GameRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GameController extends Controller
{

    private $game_repo;

    /**
     * GameController constructor.
     * @param $game_repo
     */
    public function __construct(GameRepositoryInterface $game_repo)
    {
        $this->game_repo = $game_repo;
    }


    /**
     * @SWG\Get(
     *      path="game/all",
     *      summary="Get list of all games",
     *      description="Returns list of all games",
     *      @SWG\Response(
     *          response=200,
     *          description="Success"
     *       ),
     *     )
     *
     * Display a listing of all games.
     */
    public function index()
    {
        //when we return collection (more then one data)
        return GameResource::collection($this->game_repo->all());
    }

    /**
     * Display the specified resource.
     *
     * @SWG\Get(
     *      path="game/{game_id}",
     *      summary="Get single game data",
     *      description="Returns single game data",
     *      @SWG\Response(
     *          response=200,
     *          description="Success"
     *       ),
     *     )
     * @param Game $game
     * @return GameResource
     */
    public function show(Game $game)
    {
        //when we return single object
        return new GameResource($game);
    }

}
