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
    public function __construct(private StatusService $proxmoxService)
    {

    }
    public function index(Server $server) {
        return $this->proxmoxService->fetchStatus($server, $server->node());
    }
}