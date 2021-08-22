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
        $this->powerService($server)->stop();
    }

    public function start(Server $server) {
        $this->powerService($server)->start();
    }

    public function kill(Server $server) {
        $this->powerService($server)->end();
    }

    public function restart(Server $server) {
        $this->powerService($server)->reboot();
    }
}
