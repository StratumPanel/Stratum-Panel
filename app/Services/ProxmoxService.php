<?php

namespace App\Services;

use proxmox\pve;
use App\Models\Server;

/**
 * ProxmoxService class
 */
class ProxmoxService
{
    /**
     * Proxmox initializer
     *
     * @param Server|int $server
     * @param mixed $cluster
     */
    public function proxmox(Server|int $server, $cluster)
    {
        if ($server instanceof Server) {
            $vmid = $server->vmid;
            $cluster = $server->node;
        } else if (!$server instanceof Server) {
            $vmid = $server;
        }

        $node = [
            'hostname' => $cluster->hostname,
            'username' => $cluster->username,
            'password' => $cluster->password,
            'authType' => $cluster->auth_type,
            'port' => $cluster->port,
        ];

        $proxmox = new pve($node);

        return $proxmox->nodes()->node($cluster->name)->qemu->vmid($vmid);
    }
}
