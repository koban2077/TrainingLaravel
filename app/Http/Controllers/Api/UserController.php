<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function create(Request $request)
    {
        $password = Hash::make($request->input('password'));

        $newUser = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password
        ]);

        $newUser->save();
    }

    public function update(User $user, Request $request)
    {
        $user->update($request->all());
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}
