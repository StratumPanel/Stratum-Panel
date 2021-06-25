<?php

namespace App\Http\Controllers\Client\Servers;

use App\Models\Server;
use App\Http\Controllers\Controller;
use App\Services\Servers\PowerService;
use App\Services\Servers\StatusService;

class StatusController extends Controller
{
    public function __construct(private Server $server, private StatusService $powerService)
    {

    }
}
 // DD CXDXZXZXZXZXZXZXZXSXS XXXZXZXXZXXZZZZZZZZZZZZZZZZZZZ  SAzxsszzxzxaxzxzxzzxzxzxzxzx sorry was replacing the keycaps for my z and x keys because I was/was wanting to play osu