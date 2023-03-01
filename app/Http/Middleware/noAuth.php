<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\HttpClient;

class noAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('token') != null) {
            $auth = HttpClient::fetch(
                "GET",
                HttpClient::apiUrl()."me"
            );
            if(!$auth['success']) {
                return redirect("/");
            }else{
                session()->flush();
            }
        }
        return $next($request);
    }
}
