<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\ApplicationApiController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApplicationApiController
{
    public function index(Request $request)
    {
        if ($request->wantsJson())
        {
            return $this->returnContent(User::all());
        } else {
            return inertia('Admin/Users/Index', [
                'users' => User::select('id', 'name', 'email', 'root_admin')->paginate(20)
            ]);
        }
    }

    public function show(User $user, Request $request)
    {
        if ($request->wantsJson())
        {
            return $this->returnContent($user);
        } else {
            return inertia('Admin/Users/Show', [
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'root_admin' => $user->root_admin,
                ]
            ]);
        }
    }
}
