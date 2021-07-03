<?php

namespace App\Services;

use proxmox\pve;
use App\Models\Server;

abstract class ProxmoxService
{

    public function proxmox($cluster, $vmid)
    {
        if ($vmid instanceof Server)
        {
            $vmid = $vmid->proxmoxvmid;
        }

        $proxmox = new pve($cluster);

        return $proxmox;
    }
}