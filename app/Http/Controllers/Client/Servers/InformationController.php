<?php

namespace App\Http\Controllers\Client\Servers;

use App\Http\Controllers\ApplicationApiController;
use App\Models\Server;
use Illuminate\Http\Request;

class InformationController extends ApplicationApiController
{
    public function index(Server $server)
    {
        return inertia('Servers/Information', [
            'server' => $server,
        ]);
    }
}
