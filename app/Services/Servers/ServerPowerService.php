<?php

namespace Stratum\Services\Servers;

use proxmox\Api\nodes\node;
use proxmox\pve;
use Stratum\Models\Server;
use Stratum\Models\Nodes;

class ServerPowerService
{
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
    
    public function kill() 
    {
        return $this->proxmox->nodes()->node($this->server->node)->qemu()->vmid($this->server->vm_id)->status()->postStop([]);
    }

    public function shutdown(Server $server) 
    {
        return $this->proxmox->nodes()->node($server->node)->qemu()->vmid($server->vm_id)->status()->postShutdown([]);
    }

    public function start(Server $server) 
    {
        return $this->proxmox->nodes()->node($server->node)->qemu()->vmid($server->vm_id)->status()->postStart([]);
    }

    public function reboot(Server $server) 
    {
        return $this->proxmox->nodes()->node($server->node)->qemu()->vmid($server->vm_id)->status()->postReboot([]);
    }
}