<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index () {
        $users = User::all();
        return view ('admin.users.list', ['users'=>$users]);
    }

    public function showEditForm ($id){
        $user = User::find($id);
        if($user === null) {
            abort(404);
        }
        return view('admin.users.edit', ['user' => $user]);
    }

    public function showCreateForm (){
        return view('admin.users.edit');
    }

    public function remove ($id){
        $user = User::find($id);
        if ($user === null) {
            abort(404);
        }
        $user->delete();
        return redirect (route('admin.index'));
    }

    public function store (Request $request, $id = null)
    {
        $validate_rules = [
            'name' => 'required|max:50',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
        ];

        $user = new User;
        if ($id) {
            $user = User::find($id);
        }

        if ($user->email === $request->email) {
            $validate_rules['email'] = 'required|email';
        }

        $this->validate ($request, $validate_rules);

        $fields = ['name', 'email', 'role'];
        $user->fill($request->only($fields));

        $password = $request->get('password');
        if ($password != $user->password){
            $user->password = password_hash($password, PASSWORD_DEFAULT);
        }
        $user->save();

        return redirect (route('admin.index'))->with('status', 'Данные сохранены успешно!');
    }

}
