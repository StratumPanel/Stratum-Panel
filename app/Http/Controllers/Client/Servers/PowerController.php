<?php

namespace App\Http\Controllers\Client\Servers;

use App\Models\Server;
use App\Http\Controllers\Controller;
use App\Services\Servers\PowerService;

class PowerController extends Controller
{

    public function __construct(private PowerService $powerService)
    {
    }

    public function shutdown(Server $server) {
        $this->powerService->shutdown($server);
    }

    public function start(Server $server) {
        $this->powerService->start($server);
    }

    public function kill(Server $server) {
        $this->powerService->kill($server);
    }

    public function restart(Server $server) {
        $this->powerService->reboot($server);
    }
}
