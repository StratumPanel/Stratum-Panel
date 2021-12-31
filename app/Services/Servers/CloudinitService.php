<?php

namespace App\Services\Servers;

use App\Models\Server;
use App\Services\ProxmoxService;
use App\Enums\Servers\Cloudinit\AuthenticationType;
use App\Enums\Servers\Cloudinit\BiosType;

/**
 * Class SnapshotService
 * @package App\Services\Servers
 */
class CloudinitService extends ProxmoxService
{
    private function instance(Server|int $server, $cluster)
    {
        return $this->proxmox($server, $cluster)->qemu()->vmid($server->vmid)->config();
    }

    /**
     * @param string $password
     * @param array $params
     * @return mixed
     */
    public function changePassword(string $password, AuthenticationType $type, $server, $cluster = [])
    {
        return $this->instance($server, $cluster)->post([$type->value => $password]);
    }

    /**
     * @param BiosType $type
     * @param array $params
     * @return mixed
     */
    // Generally needed for Windows VM's with over 2TB disk, still WIP since I still need to add EFI disk
    public function changeBIOS(BiosType $type, $server, $cluster = [])
    {
        return $this->instance($server, $cluster)->post(['bios' => $type->value]);
    }

    /**
     * @param string $hostname
     * @param array $params
     * @return mixed
     */
    public function changeHostname(string $hostname, $server, $cluster = [])
    {
        return $this->instance($server, $cluster)->post(['seachdomain' => $hostname]);
    }

    /**
     * @param string $dns
     * @param array $params
     * @return mixed
     */
    public function changeNameserver(string $nameserver, $server, $cluster = [])
    {
        return $this->instance($server, $cluster)->post(['nameserver' => $nameserver]);
    }


}
