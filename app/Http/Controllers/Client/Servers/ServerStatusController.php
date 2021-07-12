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
class ServerStatusController extends Controller
{
    /**
     * ServerStatusController constructor.
     * @param Server $server
     * @param StatusService $powerService
     */
    public function __construct(private Server $server, private StatusService $powerService)
    {

    }
}