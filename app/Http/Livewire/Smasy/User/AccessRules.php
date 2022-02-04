<?php

namespace App\Http\Livewire\Smasy\User;

use App\Http\Livewire\Smasy\SmasyComponent;

class AccessRules extends SmasyComponent
{
    public $title  = 'user.users';
    public $header = 'user.users_access';

    public function render()
    {
        return view('livewire.smasy.users.access-rules');
    }
}
