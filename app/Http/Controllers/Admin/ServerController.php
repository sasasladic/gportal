<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\GameRepositoryInterface;
use App\Repositories\MachineRepositoryInterface;
use App\Repositories\ModRepositoryInterface;
use App\Repositories\ServerRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Server;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServerController extends Controller
{

    private $server, $machine, $game, $mod, $user;

    public function __construct(
        ServerRepositoryInterface $server,
        MachineRepositoryInterface $machine,
        GameRepositoryInterface $game,
        ModRepositoryInterface $mod,
        UserRepositoryInterface $users
    ) {
        $this->server = $server;
        $this->machine = $machine;
        $this->game = $game;
        $this->mod = $mod;
        $this->user = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.server.index', ['data' => $this->server->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $machines = $this->machine->all();
        $games = $this->game->all();
        $mods = $this->mod->all();
        $users = $this->user->all();
        return view('admin.server.create',
            ['machines' => $machines, 'games' => $games, 'mods' => $mods, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return ($this->server->store($request->all())) ? redirect()->route('server.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.')->withInput($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Server $server
     * @return Response
     */
    public function edit(Server $server)
    {
        $machines = $this->machine->all();
        $games = $this->game->all();
        $mods = $this->mod->all();
        $users = $this->user->all();
        return view('admin.server.edit',
            ['data' => $server, 'machines' => $machines, 'games' => $games, 'mods' => $mods, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Server $server
     * @return Response
     */
    public function update(Request $request, Server $server)
    {
        return $this->mod->update($server,
            $request->all()) ? redirect()->route('server.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Server $server
     * @return Response
     */
    public function destroy(Server $server)
    {
        return $this->server->delete($server) ? redirect()->route('server.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.');
    }
}
