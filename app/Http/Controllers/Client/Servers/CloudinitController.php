<?php

namespace App\Http\Controllers\Client\Servers;

use App\Http\Controllers\ApplicationApiController;
use App\Models\Server;
use App\Services\Servers\CloudinitService;
use Illuminate\Http\Request;
use App\Http\Requests\Client\Servers\Security\UpdatePasswordRequest;
use App\Http\Requests\Client\Servers\Settings\UpdateNetworkConfigRequest;
use App\Enums\Servers\Cloudinit\AuthenticationType;

class CloudinitController extends ApplicationApiController
{
    public function __construct(private CloudinitService $cloudinitService)
    {
    }

    public function updatePassword(Server $server, UpdatePasswordRequest $request)
    {
        $this->cloudinitService->changePassword($request->password, AuthenticationType::from($request->type), $server);

        return $request->wantsJson()
            ? $this->returnNoContent()
            : back()->with('status', 'password-updated');
    }

    public function updateBios(Server $server, Request $request)
    {
        $request->validate([
            'type' => 'required|alpha_dash'
        ]);

        $this->cloudinitService->changeBIOS($request->type, $server);

        return $request->wantsJson()
            ? $this->returnNoContent()
            : back()->with('status', 'bios-updated');
    }

    public function updateNetworkConfig(Server $server, UpdateNetworkConfigRequest $request)
    {
        $this->cloudinitService->changeHostname($request->hostname, $server);
        $this->cloudinitService->changeNameserver(implode(',', $request->nameservers), $server);

        return $request->wantsJson()
            ? $this->returnNoContent()
            : back()->with('status', 'network-config-updated');
    }
}
