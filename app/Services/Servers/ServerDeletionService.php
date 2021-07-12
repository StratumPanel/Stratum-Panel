<?php 

namespace App\Services\Servers;

use App\Services\ProxmoxService;

/**
 * Class ServerDeletionService
 * @package App\Services\Servers
 */
class ServerDeletionService extends ProxmoxService
{
    /**
     * @param string $cluster
     * @param string $vmid
     * @param array $params
     * @return mixed
     */
    public function delete(string $cluster, string $vmid, array $params)
    {
        return $this->proxmox($cluster, $vmid)->delete($params); // WIP
    }
}