<?php

namespace App\Http\Controllers;

use App\Enums\PersonState;
use App\Models\Person;
use Illuminate\Http\Request;

class WallController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'search' => 'nullable|string|max:255'
        ]);

        $search = $validated['search'] ?? '';

        $persons = Person::where('state', PersonState::Accepted)
                         ->where('nickname', 'LIKE', "%$search%")
                         ->latest()
                         ->paginate(10)
                         ->withQueryString();

        return view('public.wall', [
            'persons' => $persons,
            'search'  => $search
        ]);
    }
}
