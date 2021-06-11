<?php

namespace App\Services\Servers;

use App\Models\Server;
use proxmox\pve as Proxmox;

class PowerService
{
    public function __construct(private Server $server, private Proxmox $pve)
    {
    }

    public function base

    public function fetchStatus(string $node, string $vmid)
    {
        return $this->proxmox->nodes()->node($node)->qemu()->vmid($vmid)->status()->current();
    }

    public function start(string $node, string $vmid, array $params)
    {
        return $this->proxmox->nodes()->qemu($node)->qemu()->vmid($vmid)->status()->postStart($params);
    }
}
