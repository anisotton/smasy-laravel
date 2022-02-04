<?php

namespace App\View\Composers\Smasy;

use Illuminate\View\View;
use Illuminate\Http\Request;

class BreadcrumbComposer
{
    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Initialize a new composer instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('breadcrumbs', $this->parseSegments());
    }

    /**
     * Parse the request route segments.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function parseSegments()
    {
        return collect($this->request->segments())->mapWithKeys(function ($segment, $key) {
            if (in_array($segment, array_keys(config('app.enabled_locales')))) {
                return [];
            }
            return [
                $segment => implode('/', array_slice($this->request->segments(), 0, $key + 1))
            ];
        });
    }
}
