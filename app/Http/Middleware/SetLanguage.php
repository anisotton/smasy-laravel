<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

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

            if (!in_array($url_lang, array_keys(config('app.enabled_locales')), true)
                && in_array($request->header('sec-fetch-dest'), ['document','iframe'], true)) {

                    $url_lang = app('getClientLanguage');

                    $new_url = $url_lang.$request->server->get('REQUEST_URI');

                    $request2 = $request->duplicate(null,null, ['pathInfo'=>$new_url]);

                    $request2->server->set('REQUEST_URI', $new_url);

                    $request2->getPathInfo();

                    $request = $request2;

            }
        }
        app()->setLocale($url_lang);

        return $next($request);
    }
}
