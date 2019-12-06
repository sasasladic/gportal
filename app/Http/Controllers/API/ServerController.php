<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ServerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JWTAuth;

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


    /**
     * @SWG\Get(
     *      path="server/all",
     *      summary="Get list of all servers",
     *      description="Returns list of all servers",
     *      @SWG\Response(
     *          response=200,
     *          description="Success"
     *       ),
     *     )
     *
     * Display a listing of all servers.
     * @return JsonResponse
     */
    public function getUserServers()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $servers = $this->server_repo->getUserServers($user->id);
        foreach ($servers as $server) {
            $server->machine;
            $server->mod;
            $server->user;
            $server->game;
        }
        return response()->json(['servers' => $servers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
