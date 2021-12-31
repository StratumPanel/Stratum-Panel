<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        return inertia('Admin/Dashboard', [
            'server_count' => Server::count(),
            'version' => config()->get('app.version'),
        ]);
    }
}
