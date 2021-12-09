<?php

namespace App\Http\Controllers\Client\Servers;

use App\Http\Controllers\ApplicationApiController;
use App\Models\Server;
use App\Services\Servers\CloudinitService;
use Illuminate\Http\Request;

class CloudinitController extends ApplicationApiController
{
    public function __construct(private CloudinitService $cloudinitService)
    {
    }

    public function changePassword(Server $server, Request $request)
    {
        $request->validate([
            'password' => 'required|alpha_dash'
        ]);

        $this->cloudinitService->changePassword($request->password, $server);

        return $this->returnNoContent();
    }

    public function changeBIOS(Server $server, Request $request)
    {
        $request->validate([
            'type' => 'required|alpha_dash'
        ]);

        $this->cloudinitService->changeBIOS($request->type, $server);

        return $this->returnNoContent();
    }

    public function changeHostname(Server $server, Request $request)
    {
        $request->validate([
            'hostname' => 'required|alpha_dash'
        ]);

        $this->changeHostname($request->hostname, $server);
    }

    public function changeNameserver(Server $server, Request $request)
    {
        $request->validate([
            'nameserver' => 'required|ipv4'
        ]);

        $this->changeHostname($request->nameserver, $server);
    }
}
