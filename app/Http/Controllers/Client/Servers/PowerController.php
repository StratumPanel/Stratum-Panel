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
        $this->powerService->shutdown($server);

        return $this->returnNoContent();
    }

    public function start(Server $server) {
        $this->powerService->start($server);

        return $this->returnNoContent();
    }

    public function kill(Server $server) {
        $this->powerService->kill($server);

        return $this->returnNoContent();
    }

    public function restart(Server $server) {
        $this->powerService->reboot($server);

        return $this->returnNoContent();
    }
}
