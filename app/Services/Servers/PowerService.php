<?php

namespace App\Services\Servers;

use App\Models\Node;
use App\Models\Server;
use App\Services\ProxmoxService;

class PowerService extends ProxmoxService
{
    public function fetchStatus($cluster, $vmid)
    {
        return $this->base($cluster, $vmid)->current();
    }

    public function start(string $cluster, string $vmid, array $params)
    {
        return $this->base($cluster, $vmid)->postStart($params);
    }
}
