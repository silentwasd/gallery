<?php

namespace App\Http\Controllers\Control\Photos;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Photo;
use Exception;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function __invoke(Request $request, Person $person)
    {
        $request->validate([
            'photo' => 'required|file'
        ]);

        $path = $request->file('photo')->store('photos', 'public');

        if (!$path)
            throw new Exception("Can't store photo");

        $photo            = new Photo();
        $photo->path      = $path;

        if (!$person->photos()->save($photo))
            throw new Exception("Can't attach photo to person");

        return redirect()->back();
    }
}
