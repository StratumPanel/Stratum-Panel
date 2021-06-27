<?php

namespace App\Http\Controllers\Client\Servers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Server;

class ServerListController extends Controller
{
    public function index(Request $request) {
        return inertia('Dashboard', [
            'servers' =>  $request->user()->servers,
        ]);

        // Data is passed through
    }
}
