<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class BranchRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->userType != 'Branch') {
            
            return redirect('/');
        }

        return $next($request);
    }
}
