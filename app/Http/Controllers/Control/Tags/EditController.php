<?php

namespace App\Http\Controllers\Control\Tags;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(?Tag $tag = null)
    {
        return view('control.tags.edit', compact('tag'));
    }
}
