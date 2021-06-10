<?php

namespace App\Http\Controllers\Client\Servers;

use App\Models\Server;
use App\Http\Controllers\Controller;
use App\Services\Servers\PowerService;

class PowerController extends Controller
{
    public function __construct(Server $server, PowerService $powerService) {
        $this->powerService = $powerService;
        $this->server = $server;
    }
}
