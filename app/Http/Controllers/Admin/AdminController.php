<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomModel;
use App\Models\TypeModel;
use App\Models\TransactionModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{
    //
    public function index(){
        $data1 = RoomModel::all()->count();
        $data2 = TypeModel::all()->count();
        $data3 = TransactionModel::where("status","Sukses")->sum("total");
        $data = TransactionModel::all();
        return view('back.pages.index')->with(["data"=>$data,"data1" => $data1, "data2" => $data2, "data3" => $data3]);
    }

    public function logout(){
        Session::flush();
        
        Auth::logout();

        return redirect('/login');
    }
}
