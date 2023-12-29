<?php

namespace App\Http\Controllers\Control\Persons;

use App\Http\Controllers\Controller;
use App\Models\Person;

class EditController extends Controller
{
    public function __invoke(?Person $person = null)
    {
        return view('control.persons.edit', compact('person'));
    }
}
