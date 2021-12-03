<?php

namespace App\Http\Controllers\Client\Servers;

use App\Http\Controllers\ApplicationApiController;
use App\Models\Server;
use App\Services\Servers\CloudinitService;
use App\Services\Servers\SnapshotService;
use App\Http\Requests\Client\Servers\Snapshots\SnapshotRequest;
use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Http\Request;

class SnapshotController extends ApplicationApiController
{
    public function __construct(private SnapshotService $snapshotService, private CloudinitService $cloudinitService)
    {
    }

    public function index(Server $server)
    {
        return inertia('Servers/Snapshots/Index', [
            'server' => $server,
            'snapshots' => array_reverse($this->snapshotService->fetchSnapshots($server)['data']),
        ]);
    }

    public function create(Server $server, SnapshotRequest $request)
    {
        $this->snapshotService->doSnapshot($request->name, $server);

        return $request->wantsJson()
            ? $this->returnNoContent()
            : back()->with('status', 'snapshot-created');
    }

    public function delete(Server $server, SnapshotRequest $request)
    {

        $this->snapshotService->deleteSnapshot($request->name, $server);

        return $this->returnNoContent();
    }

    public function rollback(Server $server, SnapshotRequest $request)
    {
        $this->snapshotService->rollbackSnapshot($request->name, $server);
    }
}
