<?php

namespace Stratum\Services\Servers;

use proxmox\Api\nodes\node;
use proxmox\pve;
use Stratum\Models\Servers;
use Stratum\Models\Nodes;

class ServerPowerService
{
    private $proxmox;

    public function __construct(Servers $server, pve $pve)
    {
        $credentials = [
            'hostname' => '127.0.0.1',
            'username' => 'root',
            'password' => 'example',
            'authType' => 'pam',
            'port' => '8006',
        ];
        $this->proxmox = new pve($credentials);
        $this->server = $server;
    }
    
    public function kill() 
    {
        return $this->proxmox->nodes()->node($this->server->node)->qemu()->vmid($this->server->vm_id)->status()->postStop([]);
    }

    public function shutdown(Servers $server) 
    {
        return $this->proxmox->nodes()->node($server->node)->qemu()->vmid($server->vm_id)->status()->postShutdown([]);
    }

    public function start(Servers $server) 
    {
        return $this->proxmox->nodes()->node($server->node)->qemu()->vmid($server->vm_id)->status()->postStart([]);
    }

    public function reboot(Servers $server) 
    {
        return $this->proxmox->nodes()->node($server->node)->qemu()->vmid($server->vm_id)->status()->postReboot([]);
    }
}