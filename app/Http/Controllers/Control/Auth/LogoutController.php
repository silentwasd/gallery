<?php

namespace App\Http\Controllers\Control\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        Auth::logout();

        if ($request->has('back'))
            return redirect()->back();

        return redirect()->route('wall');
    }
}
