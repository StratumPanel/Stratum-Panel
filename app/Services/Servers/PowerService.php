<?php

namespace App\Services\Servers;

use App\Models\Server;
use App\Services\ProxmoxService;

/**
 * Class PowerService
 * @package App\Services\Servers
 */
class PowerService extends ProxmoxService
{
    private function instance(Server|int $server, $cluster)
    {
        return $this->proxmox($server, $cluster)->qemu()->vmid($server->vmid)->status();
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function start($server, $cluster = [], array $params = [])
    {
        return $this->instance($server, $cluster)->postStart($params);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function shutdown($server, $cluster = [], array $params = [])
    {
        return $this->instance($server, $cluster)->postShutdown($params);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function kill($server, $cluster = [], array $params = [])
    {
        return $this->instance($server, $cluster)->postStop($params); // Forcefully kills the server
    }

    /**
     * @param string $cluster
     * @param string $vmid
     * @param array $params
     * @return mixed
     */
    public function reboot($server, $cluster = [], array $params = [])
    {
        return $this->instance($server, $cluster)->postStop($params);
    }
}
