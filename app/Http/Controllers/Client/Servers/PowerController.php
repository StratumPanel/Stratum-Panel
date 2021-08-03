<?php

namespace App\Http\Controllers\Client\Servers;

use App\Models\Server;
use App\Http\Controllers\Controller;
use App\Services\Servers\PowerService;

class PowerController extends Controller
{
    public function __construct(private Server $server, private PowerService $powerService)
    {

    }

    public function stop() {
        $this->powerService->stop($this->server);
    }

    public function start() {
        $this->powerService->start($this->server);
    }

    public function end() {
        $this->powerService->end($this->server);
    }

    public function reboot() {
        $this->powerService->reboot($this->server);
    }
}
