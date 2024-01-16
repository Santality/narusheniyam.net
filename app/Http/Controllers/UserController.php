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
        // $request->validate([
        //     "login"=> "required|unique:users",
        //     "password"=> "required",
        //     "lastname"=> "required|",
        //     "firstname"=> "required|",
        //     "parentname"=> "required|",
        //     "phone"=> "required",
        //     "email"=> "required",
        // ],[
        //     "email.required"=> "Поле обязательно для заполнения",
        // ]);

        $user = $request->all();

        $user = User::create([
            "login"=> $user["login"],
            "password" => Hash::make($user["password"]),
            "lastname"=> $user["lastname"],
            "firstname"=> $user["firstname"],
            "parentname"=> $user["parentname"],
            "phone"=> $user["phone"],
            "email"=> $user["email"],
        ]);
        Auth::login($user);
        return redirect("/applications");
    }

    public function signin(Request $request){
        $user = $request->all();

        if(Auth::attempt([
            "login"=> $user["login"],
            "password"=> $user["password"],
        ])){
            return redirect("/applications");
        }else{
            return redirect("/auth");
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect("/");
    }

}
