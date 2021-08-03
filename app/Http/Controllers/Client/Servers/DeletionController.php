<?php

namespace App\Http\Controllers\Client\Servers;

use App\Models\Server;
use App\Http\Controllers\Controller;
use App\Services\Servers\ServerDeletionService;

class DeletionController extends Controller
{
    public function __construct(private Server $server, private ServerDeletionService $powerService)
    {

    }

    public function destroy() {
        $this->server->destroy($this->server);
    }
}
