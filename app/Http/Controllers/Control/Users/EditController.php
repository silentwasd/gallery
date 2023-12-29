<?php

namespace App\Http\Controllers\Control\Users;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(?User $user = null)
    {
        return view('control.users.edit', compact('user'));
    }
}
