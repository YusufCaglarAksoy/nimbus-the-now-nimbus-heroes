<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Curse
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
        $curse = Curse::setHardFile(public_path('hard.txt'));
        return $next($request);

    }
}
