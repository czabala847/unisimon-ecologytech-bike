<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();

        return view('admin/users/index', compact('users'));
    }

    public function edit(User $usuario)
    {

        $user = User::findOrFail($usuario->id);
        $roles = Role::all();
        return view('admin/users/edit', compact(['user', 'roles']));
    }

    public function update(Request $request, User $usuario)
    {
        $usuario->roles()->sync($request->roles);

        return back()->with('status', 'Usuario editado con éxito');
    }

    public function destroy(User $user)
    {
        //
    }
}
