<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();
        // dd([$roles, $user->role]);
        if (in_array($user->role, $roles)) {
            return $next($request);
        }
        // foreach ($roles as $role) {
            // Check if user has the role This check will depend on how your roles are set up
        //     if ($user->role == $role) {
        //         return $next($request);
        //     }
        // }

        return redirect()
            ->to(route('home'));
    }
}
