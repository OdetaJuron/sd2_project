<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$allowedRoles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $loggedUser = Auth::user();

        if (empty($allowedRoles)) {
            abort(403);
        }

        $isAllowed = false;

        foreach ($allowedRoles as $roleName) {
            if ($loggedUser->hasRoleName($roleName)) {
                $isAllowed = true;
            }
        }

        if ($isAllowed === false) {
            abort(403);
        }

        return $next($request);
    }
}
