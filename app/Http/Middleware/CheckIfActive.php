<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class CheckIfActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if (isset($user)) {
            if ($user->isActive()) {
                return $next($request);
            }

        Auth::logout();
        }
        return redirect('/');
    }
    
    public function terminate($request, $response)
    {
        // Store the session data...
    }
}
