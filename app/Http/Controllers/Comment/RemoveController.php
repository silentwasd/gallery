<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class RemoveController extends Controller
{
    public function __invoke(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->withFragment('comments');
    }
}
