<?php

namespace App\Services\Servers;

use App\Models\Server;
use App\Services\ProxmoxService;
use proxmox\pve as Proxmox;

class StatusService extends ProxmoxService
{
    public function __construct(private Server $server, private Proxmox $pve)
    {
    }

    public function fetchStatus(string $node, string $vmid)
    {
        return $this->proxmox->nodes()->node($node)->qemu()->vmid($vmid)->status()->current();
    }
}
