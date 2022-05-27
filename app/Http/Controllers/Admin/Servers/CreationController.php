<?php

namespace App\Http\Controllers\Admin\Servers;

use App\Models\Server;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Servers\PowerService;
use App\Services\Servers\CreationService;

class CreationController extends Controller
{
    public function __construct(private Server $server, private CreationService $creationService)
    {

    }

    public function create(Server $server)
    {
        // Demo - Work in Progress
        $id = 1000;
        $name = 'test';

        $this->creationService->setServer($server)->createInstance($id, $name);

        $newServer = Server::create([
            'name' => $name,
            'node_id' => $server->node->id,
            'vmid' => $id
        ]);
    }
}
