<?php

namespace App\Http\Controllers;

use App\Enums\PersonState;
use App\Models\Person;

class PersonController extends Controller
{
    public function __invoke(Person $person)
    {
        if ($person->state != PersonState::Accepted)
            abort(404);

        $person->with('photos', 'tags', 'comments');

        return view('public.person', compact('person'));
    }
}
