<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_table_users;

class dataController extends Controller
{
    public function showdata(){
        $users = model_table_users::orderBy('id','DESC')->get();
        return view('/index',compact('users'));
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
}
