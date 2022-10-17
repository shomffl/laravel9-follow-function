<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view("users.index")->with(["users" => User::with("followers")->get(), "following_users_list" => auth()->user()->follows]);
    }

    public function show(User $user)
    {
        return view("users.profile")->with(["user" => $user->load("follows", "followers")]);
    }

    public function follow(User $user)
    {
        auth()->user()->follows()->attach($user);
        return redirect(route("users.index"));
    }

    public function unfollow(User $user)
    {
        auth()->user()->follows()->detach($user);
        return redirect(route("users.index"));
    }
}
