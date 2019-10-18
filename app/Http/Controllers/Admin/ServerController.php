<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\GameRepositoryInterface;
use App\Repositories\MachineRepositoryInterface;
use App\Repositories\ModRepositoryInterface;
use App\Repositories\ServerRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.server.index', ['data' => $this->server->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return ($this->server->store($request->all())) ? redirect()->route('mod.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.')->withInput($request->all());
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
