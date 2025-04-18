<?php
// App\Http\Middleware\SetLocale.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {

        if (session()->has('locale')) {
            App::setLocale(session('locale'));
        }

        return $next($request);
    }
}