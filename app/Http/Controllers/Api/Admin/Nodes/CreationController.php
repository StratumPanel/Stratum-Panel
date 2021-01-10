<?php

namespace Stratum\Http\Controllers;

use Illuminate\Http\Request;
use Stratum\Models\Nodes;

class CreationController extends Controller
{
    public function __construct()
    {

    }

    public function handle() {
        Nodes::create([

        ]);
    }
}
