<?php

namespace App\Services\Servers;

use proxmox\pve;

class PowerService
{
    private $proxmox;

    public function __construct(Servers $server, pve $pve) {
        $this->proxmox = $pve;
        $this->server = $server;
    }
}