<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_table_users;

class dataController extends Controller
{
    public function showdata(){
        $users = model_table_users::orderBy('id','DESC')->get();
        $users_max = model_table_users::max('id');
        return view('/index',compact('users'),compact('users_max'));
    }   
    public function add_data_DB(Request $req){
        $Data=new model_table_users();
        $Data->name=$req->name;
        $Data->age=$req->age;
        $Data->email=$req->email;
        $Data->save();
        return Response()->json($Data);
    }
    public function find_id_edit(Request $req){
        $Data_find = model_table_users::find($req->id);
        return Response()->json($Data_find);
    }
    public function edit_data_form(Request $req){
        $Data_edit = model_table_users::find($req->id);
        $Data_edit->name=$req->name;
        $Data_edit->age=$req->age;
        $Data_edit->email=$req->email;
        $Data_edit->save();
        return Response()->json($Data_edit);
        
    }
    public function remove_data_form(Request $req){
        $Data_remove = model_table_users::find($req->id);
        $Data_remove->delete();
        return Response()->json($Data_remove);
    }
}
