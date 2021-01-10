<?php

namespace Stratum\Http\Controllers;

use Spatie\Fractalistic\Fractal;
use Illuminate\Container\Container;
use Stratum\Http\Controllers\Controller;

abstract class ApiController extends Controller
{
    /**
     * @var \Spatie\Fractalistic\Fractal
     */
    protected $fractal;

    /**
     * ApiController constructor.
     */
    public function __construct(Fractal $fractal)
    {
        $this->fractal = $fractal;
    }

    /**
     * Return an instance of a transformer.
     *
     * @param string $abstract
     */
    public function getTransformer(string $abstract)
    {
        return Container::getInstance()->make($abstract);
    }
}