<?php

namespace App\Services\Servers;

use App\Models\Node;
use App\Models\Server;
use App\Services\ProxmoxService;

class PowerService extends ProxmoxService
{
    public function start(string $cluster, string $vmid, array $params)
    {
        return $this->base($cluster, $vmid)->postStart($params);
    }

    public function stop(string $cluster, string $vmid, array $params)
    {
        return $this->base($cluster, $vmid)->postShutdown($params);
    }

    public function end(string $cluster, string $vmid, array $params)
    {
        return $this->base($cluster, $vmid)->postStop($params); // Forcefully kills the server
    }

    public function reboot(string $cluster, string $vmid, array $params)
    {
        return $this->base($cluster, $vmid)->postReboot($params);
    }
}
