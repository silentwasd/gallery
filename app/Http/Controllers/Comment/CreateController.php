<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Person;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Request $request, Person $person)
    {
        $validated = $request->validate([
            'text' => 'required|string|max:65536'
        ]);

        $comment            = new Comment();
        $comment->user_id   = $request->user()->id;
        $comment->person_id = $person->id;
        $comment->text      = $validated['text'];

        $comment->save();

        return redirect()->back()->withFragment('comments');
    }
}
