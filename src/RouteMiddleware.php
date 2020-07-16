<?php

namespace Coremetrics\CoremetricsLaravel;

use Closure;
use Illuminate\Foundation\Application;

class RouteMiddleware
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
        $this->app['coremetrics.collector']->append(null, null, ['t' => TagCollection::MIDDLEWARE_END]);

        return $next($request);
    }
}