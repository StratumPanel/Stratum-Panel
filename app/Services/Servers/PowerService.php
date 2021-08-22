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
    /**
     * @var
     */
    private $instance;

    public function __construct($vmid, $cluster)
    {
        $this->instance = $this->proxmox($vmid, $cluster)->status();
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function start(array $params)
    {
        return $this->instance->postStart($params);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function stop(array $params)
    {
        return $this->instance->postShutdown($params);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function end(array $params)
    {
        return $this->instance->postStop($params); // Forcefully kills the server
    }

    /**
     * @param string $cluster
     * @param string $vmid
     * @param array $params
     * @return mixed
     */
    public function reboot(array $params)
    {
        return $this->instance->postReboot($params);
    }
}
