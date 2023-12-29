<?php

namespace App\Http\Controllers\Control\Tags;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class RemoveController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $tag->persons()->detach();

        $tag->delete();

        return redirect()->back();
    }
}
