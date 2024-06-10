<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class LogRequests
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($request->has('log_request')) {
            $route = $request->route();
            $controllerAction = $route ? $route->getActionName() : 'undefined';

            Log::channel('request_log')->info('Request Log', [
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'ip' => $request->ip(),
                'controller_action' => $controllerAction,
                'request_data' => $request->all(),
            ]);
        }

        return $response;
    }
}
