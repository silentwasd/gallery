<?php

namespace App\Http\Controllers\Control\Users;

use App\Http\Controllers\Controller;
use App\Models\User;

class RemoveController extends Controller
{
    public function __invoke(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
