<?php

namespace App\Http\Controllers\Control\Persons;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class SaveController extends Controller
{
    public function __invoke(Request $request, ?Person $person = null)
    {
        $validated = $request->validate([
            'nickname'    => 'required|string',
            'description' => 'required|string'
        ]);

        if (!$person)
            $person = new Person();

        $person->nickname    = $validated['nickname'];
        $person->description = $validated['description'];

        $person->save();

        return redirect()->route('control.persons.edit', $person);
    }
}
