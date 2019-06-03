<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    //Controller solo disponible para usuarios registrados (por ahora)
    public function __construct()
    {

        $this->middleware(['auth', 'verified']);

        $this->authorizeResource(User::class);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', User::class);

        $table = (new \Okipa\LaravelTable\Table)->model(\App\User::class)->routes(
            [
                'index' => ['name' => 'users.index'],
                'create' => ['name' => 'users.create'],
                'edit' => ['name' => 'users.edit'],
                'show' => ['name' => 'users.show'],
            ]
        );

        $table->column('id')->title('ID')->searchable();
        $table->column('name')->title('Nombre')->sortable()->searchable();
        $table->column('email')->title('E-mail');

        return view('users.index', compact('table'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:5'],
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $user = User::create($attributes);

        $user->sendEmailVerificationNotification();

        flash('Usuario creado con exito')->success();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = \Spatie\Permission\Models\Role::all();

        return view('users.show', compact('user', 'roles'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => ['required', 'string', 'min:5'],
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $user->update($attributes);
        $user->save();

        flash('Usuario editado con exito')->success();

        return redirect()->route('users.show', $user->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }

    //Asignar rol nuevo

    public function assignRole(User $user, Request $request)
    {
        $user->syncRoles($request->role);

        flash('Rol asignado con exito')->success();

        return back();
    }
}
