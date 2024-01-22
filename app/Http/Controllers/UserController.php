<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function signup(Request $request){
        $request->validate([
            "login"=> "required|unique:users",
            "password"=> "required|min:6",
            "lastname"=> "required|alpha",
            "firstname"=> "required|alpha",
            "parentname"=> "required|alpha",
            "phone"=> "required|regex:/^\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}$/",
            "email"=> "required|unique:users",
        ],[
            "login.required"=> "Поле обязательно для заполнения",
            "login.unique" => "Логин должен быть уникальным",
            "password.required" => "Поле обязательно для заполнения",
            "password.min" => "Минимальное количество символов 6",
            "lastname.required"=> "Поле обязательно для заполнения",
            "lastname.alpha" => "Поле должно содержать только буквы",
            "firstname.required"=> "Поле обязательно для заполнения",
            "firstname.alpha" => "Поле должно содержать только буквы",
            "parentname.required"=> "Поле обязательно для заполнения",
            "parentname.alpha" => "Поле должно содержать только буквы",
            "phone.required"=> "Поле обязательно для заполнения",
            "phone.regex"=> "Телефон должен быть в формате: +7(XXX)-XXX-XX-XX",
            "email.required"=> "Поле обязательно для заполнения",
            "email.unique" => "Почта должна быть уникальной",
        ]);

        $user = $request->all();

        $user = User::create([
            "login"=> $user["login"],
            "password" => Hash::make($user["password"]),
            "lastname"=> $user["lastname"],
            "firstname"=> $user["firstname"],
            "parentname"=> $user["parentname"],
            "phone"=> $user["phone"],
            "email"=> $user["email"],
            "id_role"=> 2,
        ]);
        Auth::login($user);
        return redirect("/applications");
    }

    public function signin(Request $request){
        $request->validate([
            "login"=> "required",
            "password"=> "required|min:6",
        ],[
            "login.required"=> "Поле обязательно для заполнения",
            "password.required" => "Поле обязательно для заполнения",
            "password.min" => "Минимальное количество символов 6",
        ]);

        $user = $request->all();

        if(Auth::attempt([
            "login"=> $user["login"],
            "password"=> $user["password"],
        ])){
            if(Auth::user()->id_role == 1){
                return redirect("/admin");
            }else{
                return redirect("/applications");
            }
        }else{
            return redirect()->back()->with("denied", "Неправильный логин или пароль");
        }
    }

    public function update(Request $request){
        $request->validate([
            "password"=> "nullable|min:6",
            "lastname"=> "required|alpha",
            "firstname"=> "required|alpha",
            "parentname"=> "required|alpha",
            "phone"=> "required|regex:/^\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}$/",
        ],[
            "password.required" => "Поле обязательно для заполнения",
            "password.min" => "Минимальное количество символов 6",
            "lastname.required"=> "Поле обязательно для заполнения",
            "lastname.alpha" => "Поле должно содержать только буквы",
            "firstname.required"=> "Поле обязательно для заполнения",
            "firstname.alpha" => "Поле должно содержать только буквы",
            "parentname.required"=> "Поле обязательно для заполнения",
            "parentname.alpha" => "Поле должно содержать только буквы",
            "phone.required"=> "Поле обязательно для заполнения",
            "phone.regex"=> "Телефон должен быть в формате: +7(XXX)-XXX-XX-XX",
        ]);
        $updateInfo = User::find(Auth::user()->id);
        if (!empty($request['password'])) {
            $updateInfo->password = Hash::make($request['password']);
        }
        $updateInfo->firstname = $request['firstname'];
        $updateInfo->lastname = $request['lastname'];
        $updateInfo->phone = $request['phone'];
        $updateInfo->parentname = $request['parentname'];
        $updateInfo->save();
        return redirect('/profile')->with('succes', 'Успешная регистрация');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect("/");
    }

}
