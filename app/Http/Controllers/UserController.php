<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request, User $user)
    {
        $userId = $request->input('user_id');
        $singleUser = $user->find($userId);
        return view('users/index')->with(['user' => $user->first()]);
    }
}
