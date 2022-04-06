<?php

namespace App\Http\Livewire\Smasy;

use App\Http\Livewire\Smasy\SmasyComponent;
use Illuminate\Support\Facades\DB;

class Users extends SmasyComponent
{
    public $message = 'OOOI';
    public $title  = 'user.users';
    public $header = 'user.user';
    public $heads = ['ID', 'Name', ['label' => 'Email', 'width' => 40], ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
    protected $view = 'livewire.smasy.users.users';

    public function render()
    {
        $users = DB::table('users')->get(['id', 'name', 'email', 'active'])->toArray();

        # Review: $users = User::get(['id', 'name', 'email'])

        $config = [
            'data' => $users,
            'icons' => ['active' => 'fa-check-circle text-success','inactive' => ' fa-times-circle text-danger'],
            'order' => [[1, 'asc']],
            'columns' => [['data' => 'id'], ['data' => 'name'], ['data' => 'email'], ['data' => 'active']],
        ];
        $this->paramsView = ['heads'=>$this->heads,'config'=>$config];
        return parent::render();
    }
}
