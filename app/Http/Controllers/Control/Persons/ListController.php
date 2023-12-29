<?php

namespace App\Http\Controllers\Control\Persons;

use App\Http\Controllers\Controller;
use App\Models\Person;

class ListController extends Controller
{
    public function __invoke()
    {
        $persons = Person::latest()->get();

        return view('control.persons.list', compact('persons'));
    }
}
