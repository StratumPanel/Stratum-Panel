<?php

namespace App\Http\Controllers\Client\Servers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServerListController extends Controller
{
    public function index(Request $request) {
        return inertia('Dashboard', [
            'servers' =>  $request->user()->servers,
        ]);
    }
}
