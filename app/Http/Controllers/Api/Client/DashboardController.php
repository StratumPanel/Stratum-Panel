<?php

namespace Stratum\Http\Controllers;

use Illuminate\Http\Request;
use Stratum\Repositories\ServersRepositoryEloquent;
use Stratum\Services\Servers\ServerStatusService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $serverRepository;

    public function __construct(ServersRepositoryEloquent $serverRepository, ServerStatusService $serverStatus)
    {
        $this->serverStatus = $serverStatus;
        $this->serverRepository = $serverRepository;
    }

    public function index()
    {
        $servers = $this->serverRepository->where(Auth::user()->servers()->get());
    }
}
