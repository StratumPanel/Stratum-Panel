<?php

namespace App\Http\Controllers\Client\Servers;

use App\Http\Controllers\ApplicationApiController;
use App\Http\Requests\Client\Servers\Settings\RenameServerRequest;
use App\Models\Server;
use Illuminate\Support\Facades\Redirect;

class SettingsController extends ApplicationApiController
{
    public function index(Server $server)
    {
        return inertia('Servers/Settings', [
            'server' => $server,
        ]);
    }

    public function rename(Server $server, RenameServerRequest $request)
    {
        $server->name = $request->name;
        $server->save();

        return $request->wantsJson()
            ? $this->returnNoContent()
            : back()->with('status', 'display-information-updated');
    }
}
