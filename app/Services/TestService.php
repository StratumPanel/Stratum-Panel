<?php

namespace App\Services;

class TestService extends ProxmoxService
{
    public function handle($server, $cluster)
    {
        return $this->proxmox($server, $cluster);
    }
}
