<?php

namespace App\Services;

use App\Models\Server;
use proxmox\pve;

abstract class ProxmoxService
{
    public function __construct(private pve $pve)
    {
    }

    public function proxmox($cluster, $vmid)
    {
        if ($vmid instanceof Server)
        {
            $vmid = $vmid->proxmoxvmid;
        }

        $cluster = $this->pve($cluster);

        return $cluster->nodes()->node($cluster->name)->qemu->vmid($vmid)->status();
    }
}