<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public $title  = 'user.users';
    public $header = 'user.users_access';

    public $users;

    public function index()
    {
      return UserResource::collection(User::with('ratings')->paginate(25));
    }

    public function users()
    {

        $users = DB::table('users')->get(['id', 'name', 'email'])->toArray();

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

    public function updateActive($id)
    {
        //$user = DB::table('users')->where('id', '=', $id)->first();

        dd($id);

        //return view('livewire.smasy.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns'
        ]);
        if($request['id']!=null){
            DB::table('users')
              ->where('id', $request['id'])
              ->update(['name' => $request['name'],'email' => $request['email']]);
        }else{
        $request->validate([
            'password' => 'required|min:6'
        ]);
        User::insert([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'active' => 1
        ]);
    }

        return $this->users();
    }

    public function update($lang, $id)
    {
        $user = DB::table('users')->where('id', '=', $id)->first();

        //dd($user);

        return view('livewire.smasy.edit', compact('user'));
    }
}
