<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class Companion
{
    
    public function handle(Request $request, Closure $next): Response
    {
         if(Auth::user()->user_type =='2')
         {
            return $next($request);
         }
         else
         {
             return redirect()->route('logout');
         }
    }
}
