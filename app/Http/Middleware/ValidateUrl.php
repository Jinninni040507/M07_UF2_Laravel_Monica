<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $pattern = "/[-a-zA-Z0-9@:%_\+.~#?&=\/]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&=\/]*)?/";
        $url = $request->url;
        if (!preg_match($pattern, $url)) {
            return redirect("/filmin/createFilmForm")->with("error", "La url de la imagen no es valida.");
        }
        return $next($request);
    }
}
