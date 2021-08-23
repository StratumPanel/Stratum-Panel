<?php

namespace App\Http\Controllers\Admin\Servers;

use App\Models\Server;
use App\Services\Servers\TemplateService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TemplateController extends Controller
{
    /**
     * NodeController constructor.
     * @param Server $server
     * @param StatusService $proxmoxService
     */
    public function __construct(private TemplateService $templateService)
    {

    }

    public function downloadOSTemplate($os)
    {
        switch ($os) {
            case('Ubuntu'):
                // Do something
            case('Debian'):
                // Do something
            case('AlmaLinux'):
                // Do something
            case('RockyLinux'):
                // Do something
            case('Fedora'):
                // Do something
            case('FreeBSD'):
                // Do something
        }
    }

    public function createTemplateFromVM(Server $server)
    {
        return $this->templateService->createTemplate($server, $server->node(), ["vmid" => 101]);
    }
}
