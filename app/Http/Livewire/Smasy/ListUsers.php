<?php

namespace App\Http\Livewire\Smasy;

use App\Http\Livewire\Smasy\SmasyComponent;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ListUsers extends SmasyComponent
{
    public $message = 'OOOI';
    public $title  = 'user.users';
    public $header = 'user.user';
    public $heads = ['ID', 'Name', ['label' => 'Email', 'width' => 40], ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
    protected $view = 'livewire.smasy.users.users';

    public function render()
    {
        //$users = DB::table('users')->get(['id', 'name', 'email', 'active'])->toArray();

        $users = User::get();

        # Review: $users = User::get(['id', 'name', 'email'])
        //dd($users);
        $config = [
            'data' => $users,
            'icons' => ['active' => 'fa-check-circle text-success','inactive' => ' fa-times-circle text-danger'],
            'order' => [[1, 'asc']],
            'columns' => [['data' => 'id'], ['data' => 'name'], ['data' => 'email'], ['data' => 'active']],
        ];
        //dd($config);
        $this->paramsView = ['heads'=>$this->heads,'config'=>$config];
        return parent::render();
    }
}
