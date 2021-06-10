<?php

namespace App\Http\Controllers;

use App\Services\Servers\PowerService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PowerController extends Controller
{
    public function __construct(Servers $server, PowerService $powerService) {
        $this->powerService = $powerService;
        $this->server = $server;
    }
}
