<?php

namespace App\Http\Controllers\SendPerson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('public.send-person');
    }
}
