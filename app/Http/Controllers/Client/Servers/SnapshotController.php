<?php

namespace App\Http\Controllers\Client\Servers;

use App\Models\Server;
use App\Services\Servers\SnapshotService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SnapshotController extends Controller
{
    public function __construct(private SnapshotService $snapshotService)
    {

    }

    public function index(Server $server) {
        return inertia('Servers/Snapshots/Index', [
            'server' => $server,
            'snapshots' => array_reverse($this->snapshotService->fetchSnapshots($server)['data']),
        ]);
    }

    public function createSnapshot(Server $server, Request $request) {
        $this->proxmoxService->doSnapshot($server, $server->node(), ["snapname" => $request->name]);

        return $this->returnNoContent();
    }

    public function fetch(Server $server) {
        return $this->proxmoxService->fetchSnapshots($server, $server->node());
    }
}