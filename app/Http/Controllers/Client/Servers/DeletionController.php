<?php

namespace App\Http\Controllers\Client\Servers;

use App\Models\Server;
use App\Http\Controllers\Controller;
use App\Services\Servers\PowerService;
use App\Services\Servers\ServerDeletionService;

class DeletionController extends Controller
{
    public function __construct(private Server $server, private ServerDeletionService $powerService)
    {

    }

    public function delete() {
        if ($this->server->user_id !== Auth::user()->id) {
            abort(401);
        }
        $this->server->delete($this->server);
    }
}
