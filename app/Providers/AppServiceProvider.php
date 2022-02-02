<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use FilesystemIterator;
use DirectoryIterator;
use Symfony\Component\VarDumper\VarDumper;


class AppServiceProvider extends ServiceProvider
{
    protected $publicStorages;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('getClientLanguage', function () {

            $seg = request()->segment(1);
            if (is_null($seg)) {
                return config('app.fallback_locale');
            }


            if (in_array($seg, $this->getPublicStorages('app/public'), true)) {
                // if the current url already contains a locale return it
                return  $seg;
            }

            if (in_array($seg, array_keys(config('app.enabled_locales')), true)) {
                // if the current url already contains a locale return it
                return $seg;
            }
            if (!empty(request()->cookie('locale'))) {
                // if the user's 'locale' cookie is set we want to use it
                return request()->cookie('locale');
            } else {
                // most browsers now will send the user's preferred language with the request
                // so we just read it
                $locale = request()->server('HTTP_ACCEPT_LANGUAGE');
                $locale = (substr($locale, 0, 2)=='pt')?:substr($locale, 0, 2);

            }
            if (in_array($locale, array_keys(config('app.enabled_locales')), true)) {
                return $locale;
            }
            // if the cookie or the browser's locale is invalid or unknown we fallback
            return config('app.fallback_locale');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function getPublicStorages($publicPath)
    {
        $iterator = new DirectoryIterator(storage_path($publicPath));
        $result = [];
        foreach ($iterator as $file) {
            $path = $file->getPathname();

            if (preg_match('#(^|/|\\\\)\.{1,2}$#', $path)) {
                continue;
            }

            if ($file->getType() == 'dir') {
                $explode = explode(DIRECTORY_SEPARATOR, $path);
                $result[] = array_pop($explode);
            }
        }
        return $result;
    }
}
