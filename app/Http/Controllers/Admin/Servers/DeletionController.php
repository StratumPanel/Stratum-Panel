<?php

namespace App\Http\Controllers\Client\Servers;

use App\Models\Server;
use App\Http\Controllers\Controller;
use App\Services\Servers\DeletionService;

class DeletionController extends Controller
{
    public function __construct(private DeletionService $deletionService)
    {

    }

    public function destroy(Server $server) {
        $this->deletionService->destroy($server);
    }
}
