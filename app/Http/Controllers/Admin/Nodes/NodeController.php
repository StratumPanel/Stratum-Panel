<?php

namespace App\Http\Controllers\Admin\Nodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    public function index()
    {
        return inertia('Admin/Nodes/Index');
    }

    public function showHealth()
    {
        return inertia('Admin/Nodes/Health');
    }
}
