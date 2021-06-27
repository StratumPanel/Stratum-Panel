<?php

namespace App\Http\Controllers\Client\Servers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Server;

class ServerListController extends Controller
{
    public function index() {
        return inertia('Dashboard', [
            'servers' =>  Auth::user()->servers()->get(),
        ]);

        // Data is passed through
    }
}
