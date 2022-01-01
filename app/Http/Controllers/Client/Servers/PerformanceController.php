<?php

namespace App\Http\Controllers\Client\Servers;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    public function index(Server $server)
    {
        return Inertia('Servers/Performance/Index', [
            'server' => $server,
        ]);
    }
}
