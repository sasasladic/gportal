<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ModRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ModController extends Controller
{

    private $mod_repo;

    /**
     * ModController constructor.
     * @param $mod_repo
     */
    public function __construct(ModRepositoryInterface $mod_repo)
    {
        $this->mod_repo = $mod_repo;
    }


    /**
     * @SWG\Get(
     *      path="mod/all/{game_id}",
     *      summary="Get list of all mods",
     *      description="Returns list of all mods",
     *      @SWG\Response(
     *          response=200,
     *          description="Success"
     *       ),
     *     )
     *
     * Display a listing of all mods.
     * @param int $game_id
     * @return JsonResponse
     */
    public function findByGameId(int $game_id)
    {
        return response()->json(['mods' => $this->mod_repo->findByGameId($game_id)]);
    }
}
