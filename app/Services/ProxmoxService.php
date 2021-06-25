<?php

namespace App\Services;

use App\Models\Server;
use proxmox\pve as proxmox;

abstract class ProxmoxService
{
    public function __construct(private proxmox $pve)
    {
    }

    public function base($cluster, $vmid)
    {
        if ($vmid instanceof Server)
        {
            $vmid = $vmid->proxmoxvmid;
        }

        $cluster = $this->pve($cluster);

        return $cluster->nodes()->node($cluster->name)->qemu->vmid($vmid)->status();
    }
}