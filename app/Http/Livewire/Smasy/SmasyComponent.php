<?php

namespace App\Http\Livewire\Smasy;

use Livewire\Component;
use Illuminate\Support\Facades\View;
use App\View\Composers\Smasy\BreadcrumbComposer;


class SmasyComponent extends Component
{
    private $paramsShare = ['title','header'];

    public function boot()
    {
        foreach($this->paramsShare as $attr){
            View::share($attr, $this->$attr??"!!ERROR!! Attributte '{$attr}' not defined");
        }

        View::composer('*', BreadcrumbComposer::class);
    }

    public function render()
    {
        return view($this->view)
        ->extends('layouts.app');
    }
}
