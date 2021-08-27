<?php

namespace App\Services\Servers;

use App\Models\Server;
use App\Services\ProxmoxService;

/**
 * Class SnapshotService
 * @package App\Services\Servers
 */
class TemplateService extends ProxmoxService
{
    private function instance(Server|int $server, $cluster)
    {
        return $this->proxmox($server, $cluster)->qemu()->vmid($server->vmid);
    }

    public function createTemplate($server, $cluster = [], array $params = [])
    {
        return $this->instance($server, $cluster)->postTemplate($params);
    }
}
