<?php

namespace App\Http\Controllers\Control\Tags;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class ListController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::withCount('persons')
                   ->orderByDesc('persons_count')
                   ->get();

        return view('control.tags.list', compact('tags'));
    }
}
