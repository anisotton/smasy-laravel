<?php

namespace App\Http\Livewire\Smasy;

use Livewire\Component;

class Settings extends Component
{

    public $users;

    public function render()
    {
        return view('livewire.smasy.settings');
    }
    public function users()
    {
    $this->users = [
            [22, 'John Bender', '+02 (123) 123456789', '<nobr>'.'</nobr>'],
            [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.'</nobr>'],
            [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.'</nobr>'],
         ];
        return view('livewire.smasy.users');
    }
}
