<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('control.dashboard');
    }
}
