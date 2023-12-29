<?php

namespace App\Http\Controllers\Control\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->user())
            return redirect()->route('control.dashboard');

        return view('control.auth');
    }
}
