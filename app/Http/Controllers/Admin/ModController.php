<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mod;
use App\Repositories\GameRepositoryInterface;
use App\Repositories\ModRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModController extends Controller
{

    private $mod, $game;

    public function __construct(
        ModRepositoryInterface $mod,
        GameRepositoryInterface $game
    ) {
        $this->mod = $mod;
        $this->game = $game;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.mod.index', ['data' => $this->mod->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.mod.create', ['games' => $this->game->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return ($this->mod->store($request->all())) ? redirect()->route('mod.index') : redirect()->back()->with('error',
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
     * @param Mod $mod
     * @return void
     */
    public function edit(Mod $mod)
    {
        return view('admin.mod.edit', ['data' => $mod, 'games' => $this->game->all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Mod $mod
     * @return void
     */
    public function update(Request $request, Mod $mod)
    {
        return $this->mod->update($mod,
            $request->all()) ? redirect()->route('mod.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Mod $mod
     * @return Response
     */
    public function destroy(Mod $mod)
    {
        return $this->mod->delete($mod) ? redirect()->route('mod.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.');
    }
}
