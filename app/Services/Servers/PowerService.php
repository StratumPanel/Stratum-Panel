<?php

namespace App\Services\Servers;

use App\Models\Server;
use proxmox\pve as Proxmox;

class PowerService
{
    public function __construct(private Server $server, private Proxmox $pve)
    {
    }
}
