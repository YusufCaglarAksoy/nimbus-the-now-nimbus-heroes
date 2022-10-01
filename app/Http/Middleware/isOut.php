<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isOut
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            return redirect()->route('admin.panel')->withErrors('Önce çıkış yapmalısınız');

        }
        return $next($request);
    }
}
