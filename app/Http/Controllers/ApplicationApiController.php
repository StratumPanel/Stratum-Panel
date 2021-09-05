<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ApplicationApiController extends Controller
{
    protected function returnNoContent(): Response
    {
        return (new Response('', Response::HTTP_NO_CONTENT))->header('X-Inertia', true);
    }

    protected function returnContent($payload): Response
    {
        return (new Response($payload, Response::HTTP_OK))->header('X-Inertia', true);
    }
}