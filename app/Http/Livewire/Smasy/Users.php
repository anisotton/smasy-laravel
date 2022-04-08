<?php

namespace App\Http\Livewire\Smasy;

use App\Models\User;
use App\Http\Livewire\Smasy\SmasyComponent;

class Users extends SmasyComponent
{
    public $title  = 'user.users';
    public $header = 'user.user';
    public $users, $name, $email, $user_id,$config;
    public $isModalOpen = 0;
    public $heads = ['ID', 'Name', ['label' => 'Email', 'width' => 40], ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
    public $view = 'livewire.smasy.users.users';

    public function render()
    {
        $this->users = User::all();
        $this->config = [
            'data' => $this->users,
            'icons' => ['active' => 'fa-check-circle text-success','inactive' => ' fa-times-circle text-danger'],
            'order' => [[1, 'asc']],
            'columns' => [['data' => 'id'], ['data' => 'name'], ['data' => 'email'], ['data' => 'active']],
        ];
        return parent::render();
    }
    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm(){
        $this->name = '';
        $this->email = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
        ]);
        session()->flash('message', $this->user_id ? 'User updated.' : 'User created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User deleted.');
    }

    public function updateActive($id)
    {
        if ($id != null) {
            if (User::where('id', '=', $id) != null) {
                if (((User::where('id', '=', $id)->first())->active) == 1) {
                    User::where('id', '=', $id)->update(['active' => 0]);
                } else {
                    User::where('id', '=', $id)->update(['active' => 1]);
                }
            }else{
                session()->flash('message', 'Something gone wrong!');
            }
        }
    }
}
