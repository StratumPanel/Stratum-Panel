<?php

namespace App\Http\Controllers\Client\Servers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Server;

class ServerController extends Controller
{
    public function index(Request $request) {
        return inertia('Dashboard', [
            'servers' =>  $request->user()->servers,
        ]);
    }

    public function show(Server $server) {
        return inertia('Servers/General', [
            'server' => $server,
        ]);
    }
}
