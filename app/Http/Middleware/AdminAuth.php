<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
   
   public function handle($request, Closure $next)
{
    if (!auth()->guard('admin')->check()) {
        return redirect()->route('admin.login'); // or abort(403);
    }
 
    return $next($request);
} 
}