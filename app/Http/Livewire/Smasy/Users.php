<?php

namespace App\Http\Livewire\Smasy;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Livewire\Smasy\SmasyComponent;
use Illuminate\Support\Facades\Hash;

class Users extends SmasyComponent
{
    public $title  = 'user.users';
    public $header = 'user.user';
    public $users, $name, $email, $user_id, $config, $password;
    public $isModalOpen = 0;
    public $showDiv = false;
    public $showButton = false;
    public $heads = ['ID', 'Name', ['label' => 'Email', 'width' => 40], ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
    public $view = 'livewire.smasy.users.users';

    protected $rules = [
        'name' => 'required|min:5',
        'email' => 'required|email:rfc,dns',
        'password' => 'required|min:6'
    ];

    public function render()
    {
        $this->users = User::all();
        $this->config = [
            'data' => $this->users,
            'icons' => ['active' => 'fa-check-circle text-success', 'inactive' => ' fa-times-circle text-danger'],
            'order' => [[1, 'asc']],
            'columns' => [['data' => 'id'], ['data' => 'name'], ['data' => 'email'], ['data' => 'active']],
        ];
        return parent::render();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function openDiv()
    {
        $this->showDiv =! $this->showDiv;
    }

    public function toList()
    {
        $this->view = 'livewire.smasy.users.users';

        return parent::render();
    }

    public function saveContact()
    {
        $validatedData = $this->validate();

        dd($validatedData);

        Users::create($validatedData);
    }

    public function submit()
    {
        dd($this->name);

        // $request->validate([
        //     'name' => 'required|min:5',
        //     'email' => 'required|email:rfc,dns'
        // ]);
        // if ($request['id'] != null) {
        //     User::where('id', $request['id'])
        //         ->update(['name' => $request['name'], 'email' => $request['email'], 'active' => $request['active']]);
        // } else {
        //     $request->validate([
        //         'password' => 'required|min:6'
        //     ]);
        //     User::insert([
        //         'name' => $request['name'],
        //         'email' => $request['email'],
        //         'password' => Hash::make($request['password']),
        //         'active' => 1
        //     ]);
        // }

        // return $this->users();
    }

    public function createOrUpdate()
    {
        $this->view = 'livewire.smasy.users.user';

        return parent::render();
    }
    public function create()
    {
        $this->reset();

        $this->showDiv = true;

        return $this->createOrUpdate();
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    // public function store()
    // {
    //     $this->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //     ]);

    //     User::updateOrCreate(['id' => $this->user_id], [
    //         'name' => $this->name,
    //         'email' => $this->email,
    //     ]);
    //     session()->flash('message', $this->user_id ? 'User updated.' : 'User created.');
    //     $this->closeModalPopover();
    //     $this->resetCreateForm();
    // }
    public function edit($id)
    {
        $this->showDiv = false;
        $this->showButton = true;
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        return $this->createOrUpdate();
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
            } else {
                session()->flash('message', 'Something gone wrong!');
            }
        }
    }
}
