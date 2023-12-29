<?php

namespace App\Http\Controllers\SendPerson;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Photo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class SendController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'nickname'    => 'required|string|unique:people',
            'description' => 'required|string',
            'photos'      => 'nullable|array|max:10',
            'photos.*'    => 'required|file'
        ]);

        $person = new Person();

        $person->nickname    = $validated['nickname'];
        $person->description = $validated['description'];

        $person->save();

        /** @var UploadedFile $file */
        foreach ($request->file('photos') as $file) {
            $path = $file->store('photos', 'public');

            if (!$path)
                throw new Exception("Can't store photo");

            $photo       = new Photo();
            $photo->path = $path;

            if (!$person->photos()->save($photo))
                throw new Exception("Can't attach photo to person");
        }

        return redirect()->back()->with('success', __('send-person.success'));
    }
}
