<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateUrl
{
    public function handle(Request $request, Closure $next)
    {
       
        $url = $request->image_url;
        $url = filter_var($url, FILTER_SANITIZE_URL);

        if (filter_var($url, FILTER_VALIDATE_URL)) {
        } else {
            return redirect('/')->withErrors(['errors' => 'La URL no es valida']);
        }

        return $next($request);
    }
}
