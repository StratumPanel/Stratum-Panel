<?php 

namespace App\Services\Servers;

use App\Services\ProxmoxService;

class ServerDeletionService extends ProxmoxService
{
    public function delete(string $cluster, string $vmid, array $params)
    {
        return $this->base($cluster, $vmid)->delete($params); // WIP
    }
}