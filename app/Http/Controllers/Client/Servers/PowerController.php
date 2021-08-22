<?php

namespace App\Http\Controllers\Client\Servers;

use App\Models\Server;
use App\Http\Controllers\Controller;
use App\Services\Servers\PowerService;
use ReflectionClass;

class PowerController extends Controller
{
    private $powerService;

    public function __construct(PowerService $powerService)
    {
        $this->powerService = function ($server) use ($powerService) {
            $class = new ReflectionClass($powerService);
            return $class->newInstanceArgs($server);
        };
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
