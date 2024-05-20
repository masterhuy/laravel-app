<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    protected $user;
    protected $role;

    public function __construct(User $user, Role $role){
        $this->user = $user;
        $this->role = $role;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest('id')->paginate(5);
        // dd($users);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all()->groupBy('group');
        return view('admin.users.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|max:10',
        // ],[
        //     'name.required' => 'This field is required',

        //     'email.required' => 'This field is required',
        //     'email.email' => 'This field is email',

        //     'password.required' => 'This field is required',
        //     'password.max' => 'This field is max 10',
        // ]);

        $dataCreate = $request->all();
        $dataCreate['image'] = $this->user->saveImage($request);
        dd($dataCreate);exit;
        $user = User::create($dataCreate);

        return to_route('users.index')->with(['message' => 'Create user success']);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $dataUpdate = $request->all();
        // dd($dataUpdate);
        $user->update($dataUpdate);

        return to_route('users.index')->with(['message' => 'Update user success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return to_route('users.index')->with(['message' => 'Delete success']);
    }
}