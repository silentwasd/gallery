<?php

namespace App\Http\Controllers\Control\Photos;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Exception;

class RemoveController extends Controller
{
    public function __invoke(Photo $photo)
    {
        if (!$photo->delete())
            throw new Exception("Can't delete photo");

        return redirect()->back();
    }
}
