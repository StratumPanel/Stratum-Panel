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
            // not done
            return $this->returnNoContent();
        }
    }

    public function show(User $user, Request $request)
    {
        if ($request->wantsJson())
        {
            return $this->returnContent($user);
        } else {
            // not done
            return $this->returnNoContent();
        }
    }
}
