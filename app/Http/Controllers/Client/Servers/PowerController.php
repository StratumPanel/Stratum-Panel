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
        if ($this->server->user_id !== Auth::user()->id) {
            abort(401);
        }
        $this->powerService->stop($this->server);
    }

    public function start() {
        if ($this->server->user_id !== Auth::user()->id) {
            abort(401);
        }
        $this->powerService->start($this->server);
    }

    public function end() {
        if ($this->server->user_id !== Auth::user()->id) {
            abort(401);
        }
        $this->powerService->end($this->server);
    }

    public function reboot() {
        if ($this->server->user_id !== Auth::user()->id) {
            abort(401);
        }
        $this->powerService->reboot($this->server);
    }
}
