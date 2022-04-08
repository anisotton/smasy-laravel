<?php

namespace App\Http\Livewire\Smasy;

use App\Http\Livewire\Smasy\SmasyComponent;

class NewUser extends SmasyComponent
{

    public $title  = 'user.users';
    public $header = 'user.user';
    protected $view = 'livewire.smasy.users.new';

    public function render()
    {
        return parent::render();
    }
}
