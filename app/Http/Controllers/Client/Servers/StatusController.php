<?php

namespace App\Http\Controllers\Client\Servers;

use App\Models\Server;
use App\Http\Controllers\Controller;
use App\Services\Servers\PowerService;
use App\Services\Servers\StatusService;

/**
 * Class ServerStatusController
 * @package App\Http\Controllers\Client\Servers
 */
class StatusController extends Controller
{
    /**
     * ServerStatusController constructor.
     * @param Server $server
     * @param StatusService $proxmoxService
     */
    public function __construct(private Server $server, private StatusService $proxmoxService)
    {

    }
    public function index() {
        if ($this->server->user_id !== Auth::user()->id) {
            abort(401);
        }

        $this->proxmoxService->fetchStatus($this->server->node->cluster, $this->server);

    }
}