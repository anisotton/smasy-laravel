<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLanguage
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
        $url_lang = $request->segment(1);
        if($url_lang !== 'api') {
            if (!in_array($url_lang, array_keys(config('app.enabled_locales')), true)) {
                return redirect(app('getClientLanguage') . '/' . request()->path());
            }
            app()->setLocale($url_lang);
        }
        return $next($request);
    }
}
