<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('login.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6',

        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt([
            'email' => $email,
            'password' => $password
        ])
        ) {
            return redirect('/');
        } else {
            $request->session()->flash('message', 'invalid email');
            return redirect('/login');
        }

    }

    public function getRegister()
    {
        return view('login.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email| unique:users',
            'name' => 'required|max:15',
            'password' => 'required|max:10',

        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', '=', '$email');

        if ($user->count()) {
            $request->session()->flash('message', 'User already exit');
            return redirect('/register');
        } else {

            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = bcrypt($password);

            if ($user->save()) {
                $request->session()->flash('message', 'user registered');
                return redirect('/login');
            }
        }
    }


  public function logout(){
    Auth::logout();
    return redirect('/login');
  }
}
