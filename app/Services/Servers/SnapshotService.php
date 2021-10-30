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
    public function doSnapshot(string $name, $server, $cluster = [])
    {
        return $this->instance($server, $cluster)->post(['snapname' => $name]);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function fetchSnapshots($server, $cluster = [])
    {
        return $this->instance($server, $cluster)->get();
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function rollbackSnapshot($server, string $snapname, $cluster = [])
    {
        return $this->instance($server, $cluster)->snapname($snapname)->postRollback();
    }
}
