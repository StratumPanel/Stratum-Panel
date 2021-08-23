<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    /**
     * NodeController constructor.
     * @param Server $server
     * @param StatusService $proxmoxService
     */
    public function __construct()
    {

    }
}
