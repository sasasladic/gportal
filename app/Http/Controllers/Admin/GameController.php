<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use App\Http\Controllers\Controller;
use App\Location;
use App\Repositories\GameRepositoryInterface;
use App\Repositories\LocationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GameController extends Controller
{
    protected $games;

    protected $locations;

    /**
     * GameController constructor.
     * @param GameRepositoryInterface $games
     * @param LocationRepositoryInterface $locations
     */
    public function __construct(
        GameRepositoryInterface $games,
        LocationRepositoryInterface $locations
    ) {
        $this->games = $games;
        $this->locations = $locations;
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
        return view('admin.game.create',['locations'=> $this->locations->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public function store(Request $request)
    {
        $attributes = $request->only(
            'name', 'short_name', 'description',
            'min_slots', 'max_slots', 'min_gigabytes',
            'max_gigabytes', 'increase_by'
        );

        if ($request->hasFile('image')) {
            $alt = $attributes['name'];
            $image = saveImage($request->file('image'), $alt);
            if ($image) {
                $attributes['image_id'] = $image->id;
            }
        }

        $game = new Game($attributes);
        $game->save();

        foreach ($this->locations->all() as $location) {
            if($request->get($location->city)) {
                $game->locations()->attach($location->id, ['price' => $request->get("price-$location->city")]);
            }
        }

        return redirect()->route('game.index');
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
