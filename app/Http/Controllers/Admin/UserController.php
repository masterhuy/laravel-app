<?php

namespace App\Http\Controllers\Admin;

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

    public function __construct(User $user, Role $role)
    {
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
        return view('admin.users.create');
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
        // dd($request->all());exit;

        $dataCreate['image'] = $this->user->saveImage($request);
        // dd($dataCreate);exit;
        $user = User::create($dataCreate);
        $user->images()->create(['url' => $dataCreate['image']]);
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

        $currentImage = $user->images->count() > 0 ? $user->images->first()->url : '';

        // dd($request);
        $dataUpdate['image'] = $this->user->updateImage($request, $currentImage);
        // dd($request);exit;
        $user->images()->delete();
        $user->images()->create(['url' => $dataUpdate['image']]);
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
        $user =  $this->user->findOrFail($id);
        $user->images()->delete();
        $imageName =  $user->images->count() > 0 ? $user->images->first()->url : '';
        $this->user->deleteImage($imageName);
        $user->delete();

        return redirect()->route('users.index')->with(['message' => 'Delete success']);
    }
}
