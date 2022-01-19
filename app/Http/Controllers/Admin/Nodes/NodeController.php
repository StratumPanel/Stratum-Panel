<?php

namespace App\Http\Controllers\Admin\Nodes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Nodes\StoreNodeRequest;
use App\Models\Node;
use Illuminate\Support\Facades\DB;

class NodeController extends Controller
{
    public function index()
    {
        return inertia('Admin/Nodes/Index', [
            'nodes' => DB::table('nodes')->select('name', 'cluster', 'hostname', 'port')->get()->toArray(),
        ]);
    }

    public function store(StoreNodeRequest $request)
    {
        Node::create(array_merge($request->validated(), ['auth_type' => 'pam']));

        return $request->wantsJson()
            ? $this->returnNoContent()
            : back()->with('status', 'node-created');
    }

    public function showHealth()
    {
        return inertia('Admin/Nodes/Health');
    }
}
