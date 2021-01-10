<?php

namespace Stratum\Http\Controllers\Api\Client\Servers;

use Illuminate\Http\Request;
use Stratum\Http\Controllers\Controller;
use Stratum\Models\Servers;
use Stratum\Services\Servers\ServerStatusService;

class StatusController extends Controller
{
    
    public function __construct(Servers $server, ServerStatusService $statusService)
    {
        $this->server = $server;
        $this->statusService = $statusService;
    }

    public function handle() {
        return $this->statusService->powerStatus($this->server);
    }
}
