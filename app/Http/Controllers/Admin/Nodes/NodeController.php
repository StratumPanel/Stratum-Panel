<?php

namespace App\Http\Controllers\Admin\Nodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NodeController extends Controller
{
    public function index()
    {
        return inertia('Admin/Nodes/Index', [
            'nodes' => DB::table('nodes')->select('name', 'cluster', 'hostname', 'port')->get()->toArray(),
        ]);
    }

    public function showHealth()
    {
        return inertia('Admin/Nodes/Health');
    }
}
