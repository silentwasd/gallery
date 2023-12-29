<?php

namespace App\Http\Controllers\Control\Users;

use App\Http\Controllers\Controller;
use App\Models\User;

class ListController extends Controller
{
    public function __invoke()
    {
        $users = User::all();

        return view('control.users.list', compact('users'));
    }
}
