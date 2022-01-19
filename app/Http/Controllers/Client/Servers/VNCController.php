<?php

namespace App\Http\Controllers\Client\Servers;

use App\Http\Controllers\ApplicationApiController;
use App\Models\Server;
use App\Services\Servers\StatusService;
use App\Services\Servers\VNCService;

/**
 * Class VNCController
 * @package App\Http\Controllers\Client\Servers
 */
class VNCController extends ApplicationApiController
{
    /**
     * VNCController constructor.
     * @param Server $server
     * @param StatusService $proxmoxService
     */
    public function __construct(private VNCService $VNCService)
    {

    }

    public function startVNC(Server $server)
    {
        $this->VNCService->setServer($server)->createUser();
        $this->VNCService->setServer($server)->createRole();
    }
}