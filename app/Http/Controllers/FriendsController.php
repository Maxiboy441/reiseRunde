<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users-view', compact('users'));
    }

    public function add(int $id)
    {
        Auth::user()->befriend(User::find($id));
        return back();
    }

    public function accept(int $id)
    {
        Auth::user()->acceptFriendRequest(User::find($id));
        return back();
    }

    public function deny(int $id)
    {
        Auth::user()->denyFriendRequest(User::find($id));
        return back();
    }

    public function remove(int $id)
    {
        Auth::user()->unfriend(User::find($id));
        return back();
    }
}
