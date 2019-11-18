<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use App\Http\Controllers\Controller;
use App\Repositories\GameRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GameController extends Controller
{
    protected $games;

    /**
     * GameController constructor.
     * @param GameRepositoryInterface $games
     */
    public function __construct(
        GameRepositoryInterface $games
    ) {
        $this->games = $games;
    }

    /**
     * Display a listing of the games.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.game.index', ['data' => $this->games->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public function store(Request $request)
    {
        $attributes = $request->except('image');
        if ($request->hasFile('image')) {
            $alt = $attributes['name'];
            $image = saveImage($request->file('image'), $alt);
            if ($image) {
                $attributes['image_id'] = $image->id;
            }
        }
        return ($this->games->store($attributes)) ? redirect()->route('game.index') : redirect()->back()->with('error',
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
     * @param Game $game
     * @return void
     */
    public function edit(Game $game)
    {
        return view('admin.game.edit', ['data' => $game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Game $game
     * @return Response
     */
    public function update(Request $request, Game $game)
    {
        $attributes = $request->except('image');
        if ($request->hasFile('image')) {
            $alt = $attributes['name'];
            $image = saveImage($request->file('image'), $alt);
            if ($image) {
                $attributes['image_id'] = $image->id;
            }
        }
        return $this->games->update($game,
            $attributes) ? redirect()->route('game.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.')->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Game $game
     * @return Response
     */
    public function destroy(Game $game)
    {
        return ($this->games->delete($game)) ? redirect()->route('game.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.');
    }
}
