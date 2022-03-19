<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MainController extends Controller
{
    public function home(){
        return view('home');
    }

    public function welcome(){
        return view('welcome');
    }

    public function exit(){
        auth('web')->logout();

        return redirect()->route('home');
    }
        
            // ВХОД В АКАУНТ

    public function login(){
        return view('login');
    }

    public function login_pro(Request $start){
        $valid = $start->validate([
            'email'=>['required','string','email'],
            'password'=>['required']
        ]);

        if(auth('web')->attempt($valid)){
            return redirect()->route('welcome');
        }else {
            return redirect()->route('login')->withErrors([
                'email'=>'email или пароль введены неверно!'
            ]);
        }
    }
                // РЕГИСТРАЦИЯ ПОЛЬЗОВАТЕЛЯ
          
    public function registration(){
        return view('registration');
    }

    public function registration_pro(Request $data){
        $valid = $data->validate([
             'email'=>['required','string','unique:users,email'],
             'password'=>['required','confirmed']
        ]);
                // создаем нового пользователя
        $user = User::create([
            'email'=> $data['email'],
            'password'=>bcrypt($data['password'])
        ]);

        if($user){
            auth('web')->login($user);
        }

        return redirect()->route('welcome');
    }



}
