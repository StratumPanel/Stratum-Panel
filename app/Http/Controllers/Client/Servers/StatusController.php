<?php

namespace App\Http\Controllers\Client\Servers;

use App\Http\Controllers\ApplicationApiController;
use App\Models\Server;
use App\Http\Controllers\Controller;
use App\Services\Servers\AgentService;
use App\Services\Servers\CloudinitService;
use App\Services\Servers\PowerService;
use App\Services\Servers\StatusService;

/**
 * Class ServerStatusController
 * @package App\Http\Controllers\Client\Servers
 */
class StatusController extends ApplicationApiController
{
    /**
     * ServerStatusController constructor.
     * @param Server $server
     * @param StatusService $proxmoxService
     */
    public function __construct(private StatusService $proxmoxService)
    {

    }

    public function show(Server $server) {
        return $this->returnContent($this->proxmoxService->fetchStatus($server, $server->node()));
    }
}