<?php

namespace App\Services;

use App\Models\Server;
use proxmox\pve as proxmox;

abstract class ProxmoxService
{
    public function __construct(protected proxmox $pve)
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
}