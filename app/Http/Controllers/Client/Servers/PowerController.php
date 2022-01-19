<?php

namespace App\Http\Controllers\Client\Servers;

use App\Models\Server;
use App\Services\Servers\PowerService;
use App\Http\Controllers\ApplicationApiController;

class PowerController extends ApplicationApiController
{

    public function __construct(private PowerService $powerService)
    {
    }

    public function shutdown(Server $server) {
        $this->powerService->setServer($server)->shutdown();

        return $this->returnNoContent();
    }

    public function start(Server $server) {
        return $this->returnContent($this->powerService->setServer($server)->start());
    }

    public function kill(Server $server) {
        $this->powerService->setServer($server)->kill();

        return $this->returnNoContent();
    }

    public function restart(Server $server) {
        $this->powerService->setServer($server)->reboot();

        return $this->returnNoContent();
    }
}
