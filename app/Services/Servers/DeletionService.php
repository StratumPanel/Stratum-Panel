<?php 

namespace App\Services\Servers;

use App\Services\ProxmoxService;

/**
 * Class ServerDeletionService
 * @package App\Services\Servers
 */
class DeletionService extends ProxmoxService
{
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