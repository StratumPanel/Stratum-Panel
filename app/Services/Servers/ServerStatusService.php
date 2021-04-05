<?php

namespace Stratum\Services\Servers;

use proxmox\Api\nodes\node;
use proxmox\pve;
use Stratum\Models\Server;
use Stratum\Models\Nodes;

class ServerStatusService
{
    private $proxmox;

    public function __construct(Server $server, pve $pve)
    {
        $credentials = [
            'hostname' => $server->node->hostname,
            'username' => $server->node->username,
            'password' => $server->node->password,
            'authType' => $server->node->authtype,
            'port' => strval($server->node->port),
        ];
        $this->proxmox = new $pve($credentials);
        $this->server = $server;
    }
    
    public function powerStatus(Server $server) 
    {
        return $this->proxmox->nodes()->node($server->node)->qemu()->vmid($server->vm_id)->status()->getCurrent();
    }
}