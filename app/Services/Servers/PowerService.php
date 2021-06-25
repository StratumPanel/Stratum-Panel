<?php

namespace App\Services\Servers;

use App\Models\Node;
use App\Models\Server;
use App\Services\ProxmoxService;

class PowerService extends ProxmoxService
{
    private $instance;

    public function __construct(private string $cluster, private string $vmid)
    {
        $this->instance = $this->proxmox($cluster, $vmid);
    }

    public function start(string $cluster, string $vmid, array $params)
    {
        return $this->instance->postStart($params);
    }

    public function stop(string $cluster, string $vmid, array $params)
    {
        return $this->instance->postShutdown($params);
    }

    public function end(string $cluster, string $vmid, array $params)
    {
        return $this->instance->postStop($params); // Forcefully kills the server
    }

    public function reboot(string $cluster, string $vmid, array $params)
    {
        return $this->instance->postReboot($params);
    }
}
