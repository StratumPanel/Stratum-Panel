<?php

namespace App\Http\Controllers\Client\Servers;

use App\Http\Controllers\ApplicationApiController;
use App\Models\Server;
use App\Services\Servers\SnapshotService;
use Illuminate\Http\Request;

class SnapshotController extends ApplicationApiController
{
    public function __construct(private SnapshotService $snapshotService)
    {
    }

    public function index(Server $server)
    {
        return inertia('Servers/Snapshots/Index', [
            'server' => $server,
            'snapshots' => array_reverse($this->snapshotService->fetchSnapshots($server)['data']),
        ]);
    }

    public function create(Server $server, Request $request)
    {
        $request->validate([
            'name' => 'required|alpha_dash'
        ]);

        $this->snapshotService->doSnapshot($request->name, $server);

        return $this->returnNoContent();
    }

    public function delete(Server $server, Request $request)
    {
        $request->validate([
            'name' => 'required|alpha_dash'
        ]);

        $this->snapshotService->deleteSnapshot($request->name, $server);

        return $this->returnNoContent();
    }

    public function rollback(Server $server, Request $request)
    {
        $request->validate([
            'name' => 'required|alpha_dash'
        ]);

        $this->snapshotService->rollbackSnapshot($request->name, $server);

        return $this->returnNoContent();
    }
}
