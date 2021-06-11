<?php

namespace App\Services\Servers;

use App\Models\Node;
use App\Models\Server;
use proxmox\pve as proxmox;

class PowerService
{
    public function __construct(private proxmox $pve)
    {
    }

    public function base($cluster, $vmid)
    {
        if ($vmid instanceof Server)
        {
            $vmid = $vmid->vm_id;
        }

        $cluster = $this->pve($cluster);

        return $cluster->nodes()->node($cluster->name)->qemu->vmid($vmid)->status();
    }

    public function fetchStatus($cluster, $vmid)
    {
        return $this->base($cluster, $vmid)->current();
    }

    public function start(string $cluster, string $vmid, array $params)
    {
        return $this->base($cluster, $vmid)->postStart($params);
    }
}
