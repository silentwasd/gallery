<?php

namespace App\Http\Controllers;

use App\Enums\PersonState;
use App\Models\Person;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class WallController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'search' => 'nullable|string|max:255'
        ]);

        $search      = $validated['search'] ?? '';
        $searchParts = collect(explode(',', $search))->map(fn(string $part) => trim($part))->all();

        $persons = Person::where('state', PersonState::Accepted);

        if (count($searchParts) > 1) {
            $persons->whereHas('tags', function (Builder $query) use ($searchParts) {
                $query->whereIn('name', $searchParts);
            });
        } else {
            $persons->where(function (Builder $query) use ($search) {
                $query->where('nickname', 'LIKE', "%$search%")
                    ->orWhereHas('tags', function (Builder $query) use ($search) {
                        $query->where('name', $search);
                    });
            });
        }

        $persons = $persons->latest()
                           ->with('tags')
                           ->withCount('photos', 'comments')
                           ->paginate(10)
                           ->withQueryString();

        return view('public.wall', [
            'persons' => $persons,
            'search'  => $search
        ]);
    }
}
