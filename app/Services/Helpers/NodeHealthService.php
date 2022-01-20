<?php

namespace App\Services\Helpers;

use App\Models\Node;
use App\Services\Nodes\VersionService;
use Exception;

class NodeHealthService
{
    public function __construct(private VersionService $versionService)
    {

    }

    public function handle()
    {
        $nodes = Node::all();

        $results = [];

        foreach ($nodes as $node) {
            try {
                $this->versionService->setNode($node)->getDetails();

                array_push($results, ['name' => $node->name, 'success' => true]);
            } catch (Exception $e) {
                array_push($results, ['name' => $node->name, 'success' => false]);
            }
        }

        return $results;
    }
}
