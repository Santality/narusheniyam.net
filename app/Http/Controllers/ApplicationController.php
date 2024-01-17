<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function AppCreate(Request $request){
        $data = $request->all();
        Application::create([
            "number"=> $data["number"],
            "decription"=> $data["description"],
            "id_user"=> Auth::user()->id,
            "id_status"=> '1',
        ]);
        return redirect("/applications");
    }

    public function AppList(){
        $data = Application::where('id_user', Auth::user()->id)->get();
        dd($data);
        return view("/applications", ["apps"=> $data]);
    }
}
