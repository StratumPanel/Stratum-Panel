<?php

namespace App\Http\Controllers\Admin\Nodes;

use Illuminate\Http\Response;
use App\Http\Controllers\ApplicationApiController;
use App\Http\Requests\Admin\Nodes\StoreNodeRequest;
use App\Http\Requests\Admin\Nodes\UpdateNodeRequest;
use App\Services\Nodes\Health\HealthService;
use App\Models\Node;
use App\Services\Nodes\Health\ResultsService;
use Illuminate\Support\Facades\DB;

class NodeController extends ApplicationApiController
{
    public function __construct(private HealthService $nodeHealthService, private ResultsService $healthResultsService)
    {

    }

    public function index()
    {
        return inertia('Admin/Nodes/Index', [
            'nodes' => DB::table('nodes')->select('id', 'name', 'cluster', 'hostname', 'latency', 'port')->get()->toArray(),
        ]);
    }

    public function store(StoreNodeRequest $request)
    {
        Node::create(array_merge($request->validated(), ['auth_type' => 'pam']));

        return $request->wantsJson()
            ? $this->returnNoContent()
            : back()->with('status', 'node-created');
    }

    public function update(Node $node, UpdateNodeRequest $request)
    {
        $sanitized = [];

        foreach ($request->toArray() as $key => $value) {
            if ($key === 'username' || $key === 'password') {
                if (is_string($value) && strlen($key) > 0) {
                    $sanitized[$key] = $value;
                }
            } else {
                $sanitized[$key] = $value;
            }
        }

        $node->update($sanitized);

        return $request->wantsJson()
        ? $this->returnNoContent()
        : back()->with('status', 'node-updated');
    }

    public function destroy(Node $node)
    {
        if ($node->servers()->count() > 0) {
            return $this->returnContent(['message' => 'There are still servers on this node'], Response::HTTP_INTERNAL_SERVER_ERROR);
        } else {
            $node->delete();
            return $this->returnNoContent();
        }

    }

    public function showHealth()
    {
        return inertia('Admin/Nodes/Health', [
            'nodes' => $this->healthResultsService->getDetails(),
        ]);
    }

    public function runTests()
    {
        return $this->nodeHealthService->handle();
    }
}
