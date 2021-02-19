<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {

        $query = User::query();
        if (null != $request->input('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }
        $users = $query->orderBy('name')->paginate(2);
        return view('users.index', compact('users'));
    }

}
