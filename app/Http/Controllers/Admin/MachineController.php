<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Machine;
use App\Repositories\LocationRepositoryInterface;
use App\Repositories\MachineRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MachineController extends Controller
{

    private $machine, $location;

    public function __construct(
        MachineRepositoryInterface $machine,
        LocationRepositoryInterface $location
    ) {
        $this->machine = $machine;
        $this->location = $location;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.machine.index', ['data' => $this->machine->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.machine.create', ['locations' => $this->location->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return ($this->machine->store($request->all())) ? redirect()->route('machine.index') : redirect()->back()->with('error',
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
     * @param Machine $machine
     * @return Response
     */
    public function edit(Machine $machine)
    {
        return view('admin.machine.edit', ['data' => $machine, 'locations' => $this->location->all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Machine $machine
     * @return Response
     */
    public function update(Request $request, Machine $machine)
    {
        return $this->machine->update($machine,
            $request->all()) ? redirect()->route('machine.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Machine $machine
     * @return Response
     */
    public function destroy(Machine $machine)
    {
        return $this->machine->delete($machine) ? redirect()->route('machine.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.');
    }
}
