<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\HttpClient;
use Symfony\Component\HttpFoundation\Response;

class withAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('token') != null) {
            $auth = HttpClient::fetch(
                "GET",
                HttpClient::apiUrl()."me"
            );
            if(!$auth['success']) {
                session()->flush();
                return redirect("/");
            }
        } else {
            return redirect("/");
        }
        return $next($request);
    }
}
