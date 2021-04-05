<?php

namespace Stratum\Http\Controllers\Api\Client\Servers;

use Illuminate\Http\Request;
use Stratum\Http\Controllers\Controller;
use Stratum\Services\Servers\ServerManagement;
use Stratum\Services\Servers\ServerVNCService;
use Stratum\Services\Servers\ServerStatus;
use Stratum\Services\Servers\ServerCreationService;
use Stratum\Models\Server;
use Stratum\Services\Servers\ServerStatusService;

class PowerController extends Controller
{
    
    public function __construct(Server $server, ServerCreationService $creationService, ServerVNCService $vncservice)
    {
        //$this->creationService = $creationService;
        //$this->vncservice = $vncservice;
        $this->server = $server;
    }

    public function shutdown() {
        return $this->powerService->shutdown($this->server);
    }

    public function kill() {
        return $this->powerService->kill($this->server);
    }

    public function reboot() {
        return $this->powerService->reboot($this->server);
    }

    public function start() {
        return $this->powerService->reboot($this->server);
    }
}
