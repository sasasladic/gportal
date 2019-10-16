<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\MainRepositoryInterface;
use App\Repositories\RoleRepositoryInterface;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\View\View;

class UserController extends Controller
{

    protected $roles, $users;

    /**
     * UserController constructor.
     * @param RoleRepositoryInterface $roles
     * @param MainRepositoryInterface $users
     */
    public function __construct(
        RoleRepositoryInterface $roles,
        MainRepositoryInterface $users
    ) {
        $this->roles = $roles;
        $this->users = $users;
    }
    /**
     * Display a listing of the users.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->users->all();
        return view('admin.user.index', ['data' => $users]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function create()
    {
        $roles = $this->roles->all();
        return view('admin.user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->users->store($request->all()) ? redirect()->route('user.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.')->withInput($request->all());
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing specific user.
     *
     * @param User $user
     * @return Factory|View
     */
    public function edit(User $user)
    {
        $roles = $this->roles->all();
        return view('admin.user.edit',
            ['data' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specific user.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        return $this->users->update($user, $request->all()) ? redirect()->route('user.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.')->withInput($request->all());
    }

    /**
     * Remove the specified user from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        try {
            if (!is_null($user)) {
                $this->users->delete($user);
            }
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Something went wrong, please try again.');
        }
    }
}
