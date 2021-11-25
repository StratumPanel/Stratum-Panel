<?php

namespace App\Services\Servers;

use App\Models\Server;
use App\Services\ProxmoxService;

/**
 * Class SnapshotService
 * @package App\Services\Servers
 */
class AgentService extends ProxmoxService
{
    private function instance(Server|int $server, $cluster)
    {
        return $this->proxmox($server, $cluster)->qemu()->vmid($server->vmid)->agent();
    }

    /**
     * @param string $command
     * @param array $params
     * @return mixed
     */
    public function executeCommand(string $command, string $type, $server, $cluster = [])
    {
        return $this->instance($server, $cluster)->exec($command);
    }

    /**
     * @param string $command
     * @param array $params
     * @return mixed
     */
    public function getOSInfo($server, $cluster = [], array $params = [])
    {
        return $this->instance($server, $cluster)->getOsinfo();
    }
}
