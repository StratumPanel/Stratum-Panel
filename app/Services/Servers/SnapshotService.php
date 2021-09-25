<?php

namespace App\Services\Servers;

use App\Models\Server;
use App\Services\ProxmoxService;

/**
 * Class SnapshotService
 * @package App\Services\Servers
 */
class SnapshotService extends ProxmoxService
{
    private function instance(Server|int $server, $cluster)
    {
        return $this->proxmox($server, $cluster)->qemu()->vmid($server->vmid)->snapshot();
    }

    /**
     * @param string $name
     * @param array $params
     * @return mixed
     */
    public function doSnapshot(string $name, $server, $cluster = [], array $params = [])
    {
        if ($server instanceof Server) {
            $vmid = $server->vmid;
            $cluster = $server->node;
        } else if (!$server instanceof Server) {
            $vmid = $server;
        }

        return $this->instance($server, $cluster)->post(['snapname' => $name]);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function fetchSnapshots($server, $cluster = [], array $params = [])
    {
        return $this->instance($server, $cluster)->get();
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function rollbackSnapshot($server, $cluster = [], array $params = [])
    {
        return $this->instance($server, $cluster)->snapshot()->snapname()->postRollback($params);
    }
}
