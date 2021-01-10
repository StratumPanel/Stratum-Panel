<?php

namespace Stratum\Services\Servers;

use proxmox\Api\nodes\node;
use proxmox\pve;
use Stratum\Models\Servers;
use Stratum\Models\Nodes;

class ServerStatusService
{
    private $proxmox;

    public function __construct(pve $pve)
    {
        $this->proxmox = $pve;
    }
    
    public function powerStatus(Servers $server) 
    {
        return $this->proxmox->nodes()->node($server->node)->qemu()->vmid($server->vm_id)->status()->getCurrent();
    }
}