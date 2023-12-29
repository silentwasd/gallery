<?php

namespace App\Http\Controllers\Control\Persons;

use App\Enums\PersonState;
use App\Http\Controllers\Controller;
use App\Models\Person;

class AcceptController extends Controller
{
    public function __invoke(Person $person)
    {
        $person->state = PersonState::Accepted;
        $person->save();

        return redirect()->back();
    }
}
