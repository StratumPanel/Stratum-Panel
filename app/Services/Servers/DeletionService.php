<?php 

namespace App\Services\Servers;

use App\Models\Server;
use App\Services\ProxmoxService;

/**
 * Class ServerDeletionService
 * @package App\Services\Servers
 */
class DeletionService extends ProxmoxService
{
    private function instance(Server|int $server, $cluster)
    {
        return $this->proxmox($server, $cluster)->qemu()->vmid($server->vmid);
    }

    /**
     * @param string $cluster
     * @param string $vmid
     * @param array $params
     * @return mixed
     */
    public function destroy(string $cluster, string $vmid, array $params)
    {
        return $this->proxmox($cluster, $vmid)->delete($params); // WIP
    }
}