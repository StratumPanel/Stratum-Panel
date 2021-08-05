<?php

namespace App\Http\Controllers\Client\Servers;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function index(Server $server)
    {
        return inertia('Servers/Security', [
            'server' => $server,
        ]);
    }
}
