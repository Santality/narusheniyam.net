<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function AppCreate(Request $request){
        $request->validate([
            "number"=> "required|regex:/^[АВЕКМНОРСТУХ]\d{3}[АВЕКМНОРСТУХ]{2}\d{2,3}$/u",
            "description"=> "required",
        ],[
            "number.required"=> "Поле обязательно для заполнения",
            "number.regex"=> "Номер должен быть в формате: А111ВВ22 кирилллицей",
            "description.required" => "Поле обязательно для заполнения",
        ]);
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
        $data = Application::where('id_user', Auth::user()->id)->with('status')->orderBy('created_at', 'DESC')->paginate(10);
        return view("/applications", ["apps"=> $data]);
    }

    public function AppSort(Request $request){
        if($request['sort_by'] == 1){
            $data = Application::where('id_user', Auth::user()->id)->with('status')->orderBy('created_at', 'DESC')->paginate(10);
        }
        if($request['sort_by'] == 2){
            $data = Application::where('id_user', Auth::user()->id)->with('status')->orderBy('created_at', 'ASC')->paginate(10);
        }
        if($request['sort_by'] == 3){
            $data = Application::where('id_user', Auth::user()->id)->with('status')->orderBy('id_status', 'ASC')->paginate(10);
        }
        return view("/applications", ["apps"=> $data]);
    }
}
