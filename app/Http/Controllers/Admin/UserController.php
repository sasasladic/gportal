<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidation;
use App\Repositories\RoleRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{

    protected $roles, $users;

    /**
     * UserController constructor.
     * @param RoleRepositoryInterface $roles
     * @param UserRepositoryInterface $users
     */
    public function __construct(
        RoleRepositoryInterface $roles,
        UserRepositoryInterface $users
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
     * @param UserValidation $request
     * @return Response
     */
    public function store(UserValidation $request)
    {
        $attributes = $request->except('image');
        if ($attributes['password'] != null) {
            $attributes['password'] = Hash::make($attributes['password']);
        } else {
            unset($attributes['password']);
        }
        if ($request->hasFile('image')) {
            $alt = $attributes['first_name'] . ' ' . $attributes['last_name'];
            $image = saveImage($request->file('image'), $alt);
            if ($image) {
                $attributes['image_id'] = $image->id;
            }
        }
        $attributes['status'] = 1;
        $user = new User($attributes);
        return $user->save() ? redirect()->route('user.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.')->withInput($request->all());
    }

    /**
     * Display the specified user.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', ['data' => $user, 'servers' => $user->servers, 'orders' => $user->orders]);
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
     * @param UserValidation $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserValidation $request, User $user)
    {
        $attributes = $request->except('image');
        if ($attributes['password'] != null) {
            $attributes['password'] = Hash::make($attributes['password']);
        } else {
            unset($attributes['password']);
        }
        if ($request->hasFile('image')) {
            $alt = $attributes['first_name'] . ' ' . $attributes['last_name'];
            $image = saveImage($request->file('image'), $alt);
            if ($image) {
                $attributes['image_id'] = $image->id;
            }
        }

        return $user->update($attributes) ? redirect()->route('user.show',
            $user->id) : redirect()->back()->with('error',
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
        return $this->users->delete($user) ? redirect()->route('user.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.');
    }
}
