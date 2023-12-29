<?php

namespace App\Http\Controllers\Control\Persons;

use App\Enums\PersonState;
use App\Http\Controllers\Controller;
use App\Models\Person;

class RejectController extends Controller
{
    public function __invoke(Person $person)
    {
        $person->state = PersonState::Rejected;
        $person->save();

        return redirect()->back();
    }
}
