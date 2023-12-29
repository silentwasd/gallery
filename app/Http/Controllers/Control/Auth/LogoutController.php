<?php

namespace App\Http\Controllers\Control\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke()
    {
        Auth::logout();

        return redirect()->route('wall');
    }
}
