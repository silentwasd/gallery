<?php

namespace App\Http\Controllers\Control\Persons;

use App\Http\Controllers\Controller;
use App\Models\Person;

class RemoveController extends Controller
{
    public function __invoke(Person $person)
    {
        $person->delete();

        return redirect()->back();
    }
}
