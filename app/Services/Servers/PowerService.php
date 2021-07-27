<?php

namespace App\Services\Servers;

use App\Models\Node;
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

    /**
     * PowerService constructor.
     * @param string $cluster
     * @param string $vmid
     */
    public function __construct(private string $cluster, private string $vmid)
    {
        $this->instance = $this->proxmox($cluster, $vmid)->status();
    }

    /**
     * @param string $cluster
     * @param string $vmid
     * @param array $params
     * @return mixed
     */
    public function start(string $cluster, string $vmid, array $params)
    {
        return $this->instance->postStart($params);
    }

    /**
     * @param string $cluster
     * @param string $vmid
     * @param array $params
     * @return mixed
     */
    public function stop(string $cluster, string $vmid, array $params)
    {
        return $this->instance->postShutdown($params);
    }

    /**
     * @param string $cluster
     * @param string $vmid
     * @param array $params
     * @return mixed
     */
    public function end(string $cluster, string $vmid, array $params)
    {
        return $this->instance->postStop($params); // Forcefully kills the server
    }

    /**
     * @param string $cluster
     * @param string $vmid
     * @param array $params
     * @return mixed
     */
    public function reboot(string $cluster, string $vmid, array $params)
    {
        return $this->instance->postReboot($params);
    }
}
