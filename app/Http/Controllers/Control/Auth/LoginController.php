<?php

namespace App\Http\Controllers\Control\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user)
            return redirect()->back()->with('error', 'Incorrect password');

        if (Hash::check($validated['password'], $user->password)) {
            Auth::login($user);
            return redirect()->route('wall');
        }

        return redirect()->back()->with('error', 'Incorrect password');
    }
}
