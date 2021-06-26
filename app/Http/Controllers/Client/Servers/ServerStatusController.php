<?php

namespace App\Http\Controllers\Client\Servers;

use App\Models\Server;
use App\Http\Controllers\Controller;
use App\Services\Servers\PowerService;
use App\Services\Servers\StatusService;

class ServerStatusController extends Controller
{
    public function __construct(private Server $server, private StatusService $powerService)
    {

    }
}