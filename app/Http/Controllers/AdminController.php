<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $data = Application::with('status','user')->orderBy('created_at', 'DESC')->paginate(10);
        return view("admin.index", ['apps' => $data]);
    }

    public function sort(Request $request){
        if($request['sort_by'] == 1){
            $data = Application::with('status','user')->orderBy('created_at', 'DESC')->paginate(10);
        }
        if($request['sort_by'] == 2){
            $data = Application::with('status','user')->orderBy('created_at', 'ASC')->paginate(10);
        }
        if($request['sort_by'] == 3){
            $data = Application::with('status','user')->orderBy('id_status', 'ASC')->paginate(10);
        }
        return view("admin.index", ['apps' => $data]);
    }

    public function confirm($id){
        $data = Application::find($id);
        $data->id_status = 2;
        $data->save();
        return redirect('/admin');
    }

    public function decline($id){
        $data = Application::find($id);
        $data->id_status = 3;
        $data->save();
        return redirect('/admin');
    }
}
