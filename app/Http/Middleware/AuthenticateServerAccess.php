<?php

namespace App\Http\Middleware;

use App\Models\Server;
use Closure;
use Illuminate\Http\Request;

class AuthenticateServerAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        $server = $request->route()->parameter('server');

        if (!$server instanceof Server) 
        {
            abort(404);
        }
        
        if ($user->id !== $server->user_id && !$user->root_admin)
        {
            abort(401);
        }

        return $next($request);
    }
}
