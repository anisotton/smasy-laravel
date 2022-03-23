<?php

namespace App\Http\Livewire\Smasy;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Settings extends SmasyComponent
{
    public function render()
    {
        return view('livewire.smasy.settings');
    }
}
