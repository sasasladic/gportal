<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\RoleRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->users->all();
        return view('admin.user.index', ['data' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roles->all();
        return view('admin.user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->get('password') != null) {
            $input['password'] = Hash::make($request->get('password'));
        } else {
            unset($input['password']);
        }
        $input['status'] = 1;
        $user = new User($input);
        $user->save();
        return redirect()->route('user.index');
//        $user->temporary_hash = bcrypt(now()->timestamp);
//        if($user->save()){
//            $data =array();
//            $data['email'] = $user['email'];
//            $data['name'] = $user['first_name'] . $user['last_name'];
//            $data['subject'] = 'Email confirmation';
//            $data['hash'] = $user['temporary_hash'];
//            send_email('email.confirm_password',$data);
//            return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing specific user
     *
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $user = $this->users->get($id);
        $roles = $this->roles->all();
        return view('admin.user.edit',
            ['data' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specific user
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = $this->users->get($id);
        $input = $request->all();
        if ($request->get('password') != null) {
            $input['password'] = Hash::make($request->get('password'));
        } else {
            unset($input['password']);
        }
        return $user->update($input) ? redirect()->route('user.index') : redirect()->back()->with('error',
            'Something went wrong, please try again.')->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = $this->users->get($id);
            if (!is_null($user)) {
                $this->users->delete($user);
            }
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Something went wrong, please try again.');
        }
    }
}
