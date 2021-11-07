<?php

namespace App\Services\Servers;

use App\Models\Server;
use App\Services\ProxmoxService;

class StatusService extends ProxmoxService
{
    public function fetchStatus(Server|int $server, $cluster = [])
    {
        return $this->proxmox($server, $cluster)->qemu()->vmid($server->vmid)->status()->current();
    }
}
