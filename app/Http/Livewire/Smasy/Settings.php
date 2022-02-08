<?php

namespace App\Http\Livewire\Smasy;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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
            'columns' => [['data' =>'id'],['data' =>'name'],['data' =>'email']],
        ];

        return view('livewire.smasy.users', [
            'config' => $config,
        ]);
    }
    public function new()
    {
        return view('livewire.smasy.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:6'
        ]);
        User::insertOrIgnore([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return $this->users();
    }

    public function update($id)
    {
        //$user = DB::table('users')->where('id', '=', $id)->first();
        //->where('id')==$id->get();

        dd($user);

        return view('livewire.smasy.edit', compact('user'));
    }
}
