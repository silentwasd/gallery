<?php

namespace App\Http\Controllers\Control\Persons;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Tag;
use Illuminate\Http\Request;

class SaveController extends Controller
{
    public function __invoke(Request $request, ?Person $person = null)
    {
        $validated = $request->validate([
            'nickname'    => 'required|string',
            'description' => 'required|string',
            'tags'        => 'nullable|string'
        ]);

        if (!$person)
            $person = new Person();

        $person->nickname    = $validated['nickname'];
        $person->description = $validated['description'];

        $person->save();

        if ($validated['tags'] && $tags = $this->parseTags($validated['tags']))
            $person->tags()->sync($tags);

        return redirect()->route('control.persons.edit', $person);
    }

    protected function parseTags(string $raw): array
    {
        return collect(explode(',', $raw))
            ->map(fn(string $tag) => trim($tag))
            ->unique()
            ->mapWithKeys(function (string $tag, int $order) {
                $id = Tag::createOrFirst(['name' => $tag])->id;
                return [$id => ['order' => $order]];
            })
            ->all();
    }
}
