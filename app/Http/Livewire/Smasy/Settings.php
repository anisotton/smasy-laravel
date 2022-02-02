<?php

namespace App\Http\Livewire\Smasy;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Settings extends Component
{

    public $users;

    public function render()
    {
        return view('livewire.smasy.settings');
    }
    public function users()
    {

        $users = DB::table('users')->get(['id', 'name', 'email'])->toArray();

        $this->users = [
            ['id' => 22, 'nome' => 'Anderson Isotton', 'numero' => '+02 (123) 123456789'],
            ['id' => 19, 'nome' => 'Sophia Clemens', 'numero' => '+99 (987) 987654321'],
            ['id' => 3, 'nome' => 'Peter Sousa', 'numero' => '+69 (555) 12367345243'],
        ];

        $config = [
            'data' => $users,
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];
        return view('livewire.smasy.users', [
            'config' => $config,
        ]);
    }
}
