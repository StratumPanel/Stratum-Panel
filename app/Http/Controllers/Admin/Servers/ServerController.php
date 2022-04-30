<?php

namespace App\Http\Controllers\Admin\Servers;

use App\Http\Controllers\ApplicationApiController;
use App\Models\Server;
use App\Services\Servers\CloudinitService;
use Illuminate\Http\Request;

class ServerController extends ApplicationApiController
{
    public function __construct(private CloudinitService $cloudinitService)
    {
    }
    public function index()
    {
        return inertia('Admin/Servers/Index', [
            'servers' => Server::with(['node', 'owner'])->paginate(20)->through(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'vmid' => $item->vmid,
                    'node_id' => $item->node_id,
                    'user_id' => $item->user_id,
                    'node_name' => $item->node->name,
                    'user_name' => $item->owner->name,
                ];
            })
        ]);
    }

    public function edit(Server $server)
    {
        return inertia('Admin/Servers/Edit', [
            'server' => $server,
            'config' => $this->cloudinitService->setServer($server)->fetchConfig()['data'],
        ]);
    }
}
