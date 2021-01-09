<?php

namespace Stratum\Http\Controllers;

use Stratum\Entities\IPAllocations;
use Stratum\Models\Servers;
use Stratum\Services\Servers\ServerManagement;
use Stratum\Services\Servers\ServerVNCService;
use Stratum\Services\Servers\ServerPowerService;
use Stratum\Services\Servers\ServerCreationService;
use Stratum\Repositories\IpAllocationsRepository;


class TestController extends Controller
{
    private $powerService;

    private $creationService;

    private $IpAllocationsRepository;
    // Just testing 2
    public function __construct(IpAllocationsRepository $IpAllocationsRepository, ServerPowerService $powerService, ServerCreationService $creationService, ServerVNCService $vncservice)
    {
        $this->powerService = $powerService;
        $this->creationService = $creationService;
        $this->vncservice = $vncservice;
        $this->IpAllocationsRepository = $IpAllocationsRepository;
    }

    public function index(Servers $server) {
        dd($this->powerService->shutdown($server));
    }

    public function repository()
    {
        ddd($this->IpAllocationsRepository->all());
    }

    public function help() {
        /*IPAddresses::create([
            'ip' => '127.0.0.2/24',
            'gateway' => '192.168.1.2',
            'netmask' => '255.255.255.0',
            'mac_address' => '10:E0:20:E04',
            'vm_id' => null,
            'occupied' => false
        ]);

        Nodes::create([
            'name' => 'proxmox',
            'maxmemory' => 16014,
            'maxstorage' => 203048,
            'currentmemory' => 1024,
            'currentstorage' => 10023
        ]);*/
        #$this->creationService->handle();
        $this->vncservice->handle();
    }

    public function vnc(Servers $server) {
        $this->vncservice->handle($server);
    }
}
