<?php

namespace App\Http\Controllers\Control\Tags;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class ListController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();

        return view('control.tags.list', compact('tags'));
    }
}
