<?php

namespace App\Http\Controllers\Client\Servers;

use App\Http\Controllers\ApplicationApiController;
use App\Http\Requests\Client\Servers\Settings\UpdateDisplayInfoRequest;
use App\Services\Servers\CloudinitService;
use App\Models\Server;

class SettingsController extends ApplicationApiController
{
    public function __construct(private CloudinitService $cloudinitService)
    {

    }

    public function index(Server $server)
    {
        return inertia('Servers/Settings/Index', [
            'server' => $server,
            'config' => $this->cloudinitService->setServer($server)->fetchConfig()['data'],
        ]);
    }

    public function update(Server $server, UpdateDisplayInfoRequest $request)
    {
        $server->name = $request->name;
        $server->description = $request->description;
        $server->save();

        return $request->wantsJson()
            ? $this->returnNoContent()
            : back()->with('status', 'display-information-updated');
    }
}
