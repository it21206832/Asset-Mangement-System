<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; 

class AdminRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->userType != 'Admin') {
       
            return redirect('/');
        }

        return $next($request);
    }
}

