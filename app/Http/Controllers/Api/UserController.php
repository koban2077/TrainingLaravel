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
        $arrayOfNewData = [];

        if ($request->has('name'))
        {
            $arrayOfNewData['name'] = $request->input('name');
        }
        if($request->has('email'))
        {
            $arrayOfNewData['email'] = $request->input('email');
        }
        if($request->has('password'))
        {
            $password = Hash::make($request->input('password'));
            $arrayOfNewData['password'] = $password;
        }

        $user->update($arrayOfNewData);
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}
