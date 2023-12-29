<?php

namespace App\Http\Controllers\Control\Users;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SaveController extends Controller
{
    public function __invoke(Request $request, ?User $user = null)
    {
        $validated = $request->validate([
            'name'     => 'required|string',
            'email'    => [
                'required',
                'email',
                $user ? Rule::unique('users')->ignore($user->id) : Rule::unique('users')
            ],
            'password' => [
                $user ? 'nullable' : 'required',
                'string',
                'min:8'
            ],
            'role'     => [
                'required',
                Rule::in(collect(UserRole::cases())->map(fn(UserRole $role) => $role->value))
            ]
        ]);

        if (!$user)
            $user = new User();

        $user->name     = $validated['name'];
        $user->email    = $validated['email'];
        $user->role     = UserRole::from($validated['role']);

        if (isset($validated['password']) || !$user)
            $user->password = $validated['password'];

        $user->save();

        return redirect()->route('control.users.edit', $user);
    }
}
