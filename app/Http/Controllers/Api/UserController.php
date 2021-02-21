<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function create()
    {
        $newUserArr = $this->generate();

        $newUser = new User([
            'name' => $newUserArr['name'],
            'email' => $newUserArr['email'],
            'password' => $newUserArr['password']
        ]);

        $newUser->save();
    }

    public function update(User $user)
    {
        $name = request('name');
        $user->name = $name;
        $user->save();
    }

    public function delete(User $user)
    {
        $user->delete();
    }


    private function generate()
    {
        $name = Str::random(4);
        $email = $name . '@gmail.com';

        $str = Str::random(8);
        $hash = Hash::make($str);

        return [
                'name' => $name,
                'email' => $email,
                'password' => $hash
        ];
    }
}
