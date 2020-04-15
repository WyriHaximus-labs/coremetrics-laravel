<?php

namespace Larameter;

use Closure;
use Illuminate\Foundation\Application;

class AppMiddleware
{

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->app['larameter.collector']->append(null, null, ['t' => TagCollection::MIDDLEWARE_START]);

        return $next($request);
    }
}