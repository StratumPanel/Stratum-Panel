<?php

namespace Stratum\Services\Servers;

use proxmox\Api\nodes\node;
use proxmox\pve;
use Stratum\Models\Servers;
use Stratum\Models\IPAddresses;
use Stratum\Models\Nodes;

class ServerCreationService
{
    public function __construct(pve $pve)
    {
        $this->proxmox = $pve;
    }

    public function handle()
    {
        // Plan details - just for testing, will create routes later :)
        $memory = 1024;
        $storage = 100;

        $Nodes = Nodes::get();

        $Node = null;
        $IPAddress = null;
        // $Nodes = Nodes::where('maxmemory', '<', 'currentmemory')->where('maxstorage', '<', 'currentstorage')->get(); (Unfortunately, this works but there's no way to add to current storage to check if it's actually in stock)

        // There's probably some more efficient way to do this.
        foreach ($Nodes as $node) {
            $IPAddress = $node->ipaddresses->where('occupied', false)->first();
            if ($node->maxmemory < $node->currentmemory + $memory || $node->maxstorage < $node->currentstorage + $storage && $IPAddress) {
                return print_r("out of stock");
            } else {
                $Node = $node;
            }
        }
    }

}