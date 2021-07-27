<?php

namespace App\Services;

use proxmox\pve;
use App\Models\Server;

abstract class ProxmoxService
{

    public function proxmox($cluster, $server)
    {
        if ($server instanceof Server)
        {
            $vmid = $server->proxmoxvmid;
            $cluster = [
                'hostname' => $server->node->hostname,
                'username' => $server->node->username,
                'password' => $server->node->password,
                'authType' => $server->node->auth_type,
                'port' => $server->node->port,
            ];
        }

        $proxmox = new pve($cluster);

        return $proxmox->nodes()->node($cluster->name)->qemu->vmid($vmid);
    }
}