<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function login()
    {
        return view('backend.default.login');
    }

    public function loginPage(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                // Başarılı giriş işlemi
                return redirect()->intended(route('admin.index')); // İstenen sayfaya yönlendirme
            }
            else{
                return back()->with("error","Email veya şifre yanlış");
            }
        }catch (\Exception $e){
            return $this->error(message: $e->getMessage(), statusCode: $e->getCode());
        }
    }

    public function register(){
        return view('backend.register.index');
    }

    function add(Request $request)
    {
        $user_arr = [
            "name" => $request->input('name'),
            "surname" =>$request->input('surname'),
            "email" => $request->input('email'),
            "phone" => $request->input('phone'),
            "birthday" =>$request->input('birthday'),
            "password" => Hash::make($request->input('password')),
            "role" => "USER"
        ];

        $user = User::create($user_arr);

        $userData_arr = [
            "age" => intval($request->input('age')),
            "height"=> doubleval($request->input('height')),
            "weight" =>doubleval($request->input('weight')),
            "gender" => $request->input('gender'),
            "type" => $request->input('type'),
            "bmr" => doubleval($request->input('bmr')),
            "status" => 1
        ];

        $user->user_data()->create($userData_arr);

        return redirect()->intended(route('login')); // İstenen sayfaya yönlendirme
    }

    public function logout()
    {
        try {
            if (Auth::check()) {
                Auth::guard('web')->logout();
                return redirect()->intended(route('login'));
            }
            else{
                return back()->with('error','Something went wrong');
            }
        }catch (\Exception $e){
            return back()->with('error','Something went wrong');
        }
    }
}
