<?php

namespace App\Http\Controllers\Client\Servers;

use App\Models\Server;
use App\Services\Servers\SnapshotService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SnapshotController extends Controller
{
    public function __construct(private SnapshotService $proxmoxService)
    {

    }

    public function index(Server $server, Request $request) {
        $this->proxmoxService->doSnapshot($server, $server->node(), ["snapname" => $request->name]);
        return $this->returnNoContent();
    }

    public function fetch(Server $server) {
        return $this->proxmoxService->fetchSnapshots($server, $server->node());
    }
}
