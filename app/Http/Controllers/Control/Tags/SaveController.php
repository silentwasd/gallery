<?php

namespace App\Http\Controllers\Control\Tags;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class SaveController extends Controller
{
    public function __invoke(Request $request, ?Tag $tag = null)
    {
        $validated = $request->validate([
            'name'     => 'required|string'
        ]);

        if (!$tag)
            $tag = new Tag();

        $tag->name = $validated['name'];

        $tag->save();

        return redirect()->route('control.tags.edit', $tag);
    }
}
