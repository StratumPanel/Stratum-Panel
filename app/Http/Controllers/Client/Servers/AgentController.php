<?php

namespace App\Http\Controllers\Client\Servers;

use App\Http\Controllers\ApplicationApiController;
use App\Models\Server;
use App\Services\Servers\AgentService;
use App\Services\Servers\CloudinitService;
use App\Services\Servers\SnapshotService;
use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Http\Request;

class AgentController extends ApplicationApiController
{
    public function __construct(private AgentService $agentService)
    {
    }

    public function getOSInfo(Server $server)
    {
        return $this->agentService->getOsInfo();
    }
}
