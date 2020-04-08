<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MachineResource;
use App\Http\Resources\ServerResource;
use App\Machine;
use App\Repositories\ServerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServerController extends Controller
{

    private $server_repo;

    /**
     * ServerController constructor.
     * @param $server_repo
     */
    public function __construct(ServerRepositoryInterface $server_repo)
    {
        $this->server_repo = $server_repo;
    }


    public function getGameAvailableServers(Request $request, int $gameId)
    {
        //for one single
        return ServerResource::collection($this->server_repo->findByGameId($gameId));
        //for collection
//      return SongResource::collection(Song::all());
    }

    public function getAllMachines(){
        return MachineResource::collection(Machine::all());
    }

    public function findByMachineAndGame(Request $request, int $machineId, int $gameId) {
        return ServerResource::collection($this->server_repo->findByMachineAndGame($machineId, $gameId));
    }
}
