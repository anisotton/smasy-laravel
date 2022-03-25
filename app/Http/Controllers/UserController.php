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

        $users = DB::table('users')->get(['id', 'name', 'email', 'active'])->toArray();

        # Review: $users = User::get(['id', 'name', 'email'])

        $config = [
            'data' => $users,
            'order' => [[1, 'asc']],
            'columns' => [['data' => 'id'], ['data' => 'name'], ['data' => 'email'], ['data' => 'active']],
        ];

        return view('livewire.smasy.users', [
            'config' => $config,
        ]);
    }

    public function new()
    {
        return view('livewire.smasy.new');
    }

    public function updateActive($lang, $id)
    {
        if ($id != null) {
            if (User::where('id', '=', $id) != null) {
                if (((User::where('id', '=', $id)->first())->active) == 1) {
                    User::where('id', '=', $id)->update(['active' => 0]);
                } else {
                    User::where('id', '=', $id)->update(['active' => 1]);
                }
            }
        }
        return $this->users();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns'
        ]);
        if ($request['id'] != null) {
            User::where('id', $request['id'])
                ->update(['name' => $request['name'], 'email' => $request['email'], 'active' => $request['active']]);
        } else {
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
        $user = User::where('id', '=', $id)->first();

        return view('livewire.smasy.edit', compact('user'));
    }
}
