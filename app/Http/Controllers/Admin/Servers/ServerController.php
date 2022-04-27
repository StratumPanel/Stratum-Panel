<?php

namespace App\Http\Controllers\Admin\Servers;

use App\Http\Controllers\ApplicationApiController;
use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends ApplicationApiController
{
    public function index()
    {
        return inertia('Admin/Servers/Index', [
            'servers' => Server::paginate(20)
        ]);
    }
}
