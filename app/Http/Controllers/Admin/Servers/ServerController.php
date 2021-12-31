<?php

namespace App\Http\Controllers\Admin\Servers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index()
    {
        return inertia('Admin/Servers/Index');
    }
}
