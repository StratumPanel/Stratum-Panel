<?php 

namespace App\Services\Servers;

class ServerDeletionService
{
    public function delete(string $cluster, string $vmid, array $params)
    {
        return $this->base($cluster, $vmid)->delete($params); // WIP
    }
}