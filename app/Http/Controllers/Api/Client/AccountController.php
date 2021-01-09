<?php

namespace Stratum\Http\Controllers\Api\Client;

use Illuminate\Http\Request;
use Stratum\Http\Controllers\ApiController;
use Stratum\Transformers\Api\Client\AccountTransformer;

class AccountController extends ApiController
{
    public function index(Request $request): array
    {
        return $this->fractal->item($request->user())
            ->transformWith($this->getTransformer(AccountTransformer::class))
            ->toArray();
    }
}
