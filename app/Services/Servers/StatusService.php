<?php

namespace App\Services\Servers;

use App\Models\Server;
use App\Services\ProxmoxService;
use proxmox\pve as Proxmox;

/**
 * Class StatusService
 * @package App\Services\Servers
 */
class StatusService extends ProxmoxService
{
    /**
     * StatusService constructor.
     * @param Server $server
     * @param Proxmox $pve
     */
    public function __construct(private Server $server, private Proxmox $pve)
    {
    }

    /**
     * @param string $node
     * @param string $vmid
     * @return mixed
     */
    public function fetchStatus(string $node, string $vmid)
    {
        return $this->proxmox->nodes()->node($node)->qemu()->vmid($vmid)->status()->current();
    }
}
