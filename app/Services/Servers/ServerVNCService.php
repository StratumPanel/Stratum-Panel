<?php

namespace Stratum\Services\Servers;

use proxmox\Api\nodes\node;
use proxmox\pve;
use Stratum\Models\Servers;
use Stratum\Models\Nodes;

class ServerVNCService
{
    private $proxmox;

    public function __construct(pve $pve)
    {
        $this->proxmox = $pve;
    }
    
    public function handle(Servers $server) 
    {
        return $this->proxmox->getTicket();
    }
}