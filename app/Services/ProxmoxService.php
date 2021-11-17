<?php

namespace App\Services;

use Stratum\Proxmox\PVE;
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
            $cluster->hostname,
            $cluster->username,
            $cluster->password,
            intval($cluster->port),
            $cluster->auth_type,
        ];

        $proxmox = new PVE(...$node);

        return $proxmox->nodes()->node($cluster->cluster);
    }
}
