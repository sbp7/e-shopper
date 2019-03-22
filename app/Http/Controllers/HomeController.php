<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image as ImageInt;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = \Auth::user();
        return redirect (route ('cabinet.user.', ['name'=>$user->name]));

    }

    public function cabinetUser (Request $request)
    {
        $user = \Auth::user();

        return view('users.cabinet', [
            'name'=> $user->name,
            'user'=> $user ] );
    }

    public function userEdit ()
    {
        $user = \Auth::user();
        return view('users.edit', [
            'user'=> $user ] );
    }


    public function userSave (Request $request, $id)
    {
        $validate_rules = [
            'name' => 'required|max:50',
            'email' => 'required|unique:users|email',
            'password' =>  'required|min:8',
        ];

        $user = User::find($id);
        if ($user->email === $request->email) {
            $validate_rules['email'] = 'required|email';
        }

        $this->validate ($request, $validate_rules);

        $name = $request->get('name');
        $user->name = $name;
        $email = $request->get('email');
        $user->email = $email;
        $password = $request->get('password');
        if ($password != $user->password){
            $user->password = password_hash($password, PASSWORD_DEFAULT);
        }
        $user->save();

            $path = public_path() . '\uploads\users\\' . $user->id . '//';
            $files = $request->file('file');

        if (isset($files)) {

            if (!file_exists($path)) {
                mkdir($path, 777, true);
            };

            foreach ($files as $file) {
                $filename = '.jpeg';
                $img = ImageInt::make($file);
                $img->save($path . 'origin' . $filename);
                $img->resize(50, 50)->save($path . 'mobile' . $filename);
                $img->resize(100, 100)->save($path . 'desktop' . $filename);
            };
        }
        return redirect(route('cabinet.user', ['name'=>$user->name]))->with('status', 'Данные сохранены успешно!');
    }

    public function letter ()
    {
        return view('users.letter');
    }

}
