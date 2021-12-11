<?php

namespace App\Http\Controllers\Client\Servers;

use App\Http\Controllers\Controller;
use App\Models\Server;

class SecurityController extends Controller
{
    public function index(Server $server)
    {
        return inertia('Servers/Security/Index', [
            'server' => $server,
        ]);
    }
}
