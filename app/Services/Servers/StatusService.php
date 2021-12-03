<?php

namespace App\Services\Servers;

use App\Models\Server;
use App\Services\ProxmoxService;

class StatusService extends ProxmoxService
{
    private function instance(Server|int $server, $cluster)
    {
        return $this->proxmox($server, $cluster)->qemu()->vmid($server->vmid);
    }

    public function fetchStatus($server, $cluster = [], array $params = [])
    {
        return $this->instance($server, $cluster)->status()->current()->get();
    }
}
