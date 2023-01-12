<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\TransactionModel;
use App\Models\RoomModel;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use DateTime;
use Session;
class TransactionController extends Controller
{
    public function index(){
        $data = TransactionModel::all();
        return view('back.pages.transaction.index')->with(["data" => $data]);
    }
    public function destroy($id){
        TransactionModel::destroy($id);
        return redirect()->route('admin.transaction.index');
    }
    public function edit($id){
        $data = TransactionModel::find($id);
        return view('back.pages.transaction.edit')->with(["data" => $data]);
    }
    public function update(Request $request, $id)
    {
        //
        $data =TransactionModel::find($id);
        $data->update($request->all());
        return redirect()->route("admin.transaction.index");
    }
    public function changeStatus($id, $status){
        $data = TransactionModel::find($id);
        $data->update([
            "status" => $status
        ]);
        return redirect()->back();
    }
    public function validasi($id, $UID){
        $data = TransactionModel::find($id);
        return view("front.pages.validasi")->with(["data"=>$data]);
    }
    public function uploadvalidasi(Request $request,$id){
        $transfer = $request->file('transfer_pic')->store('assets/transfer','public');
        $data = TransactionModel::find($id);
        $data->update([
            "transfer_pic" => $transfer
        ]);

        if ($data){
            Session::flash('notif', "Terima Kasih, Silahkan Berikan Kode $data->UID pada pihak hotel");
            return redirect()->back()->withInput();
        }

        return redirect()->back();

    }
    public function CreateTransaction(Request $request){
        $data = $request->except(["tgl-in","bln-in","thn-in","tgl-out","bln-out","thn-out", "price" ,"_token", "_method"]);
        $data2 = $request->only(["tgl-in","bln-in","thn-in","tgl-out","bln-out","thn-out","price"]);
        $data["Checkin"] = $data2["thn-in"]."-".$data2["bln-in"]."-".$data2["tgl-in"];
        $data["Checkout"] = $data2["thn-out"]."-".$data2["bln-out"]."-".$data2["tgl-out"];

        // ruangan tersedia dari tgl a - b
        $roomavailable = TransactionModel::where([
            ["status","=","Sukses"],
            ["tipe","=",$data["tipe"]],
            ["Checkout",">",$data["Checkin"]],
            ["Checkin","<",$data["Checkout"]]])->count();
        
        // jumlah ruangan
        $tipe = $data["tipe"];
        $roomcount = RoomModel::whereRelation("RoomType", "name", $tipe)->count();
        

        // jika jumlah ruangan tersedia == jumlah ruangan maka hotel penuh 
        if ($roomavailable == $roomcount){
            Session::flash('error', "Kamar Tidak Tersedia Pada Tanggal Tersebut");
            return redirect()->back()->withInput();
        }
        

        $data["UID"] = Carbon::now()->format('d-m-Y').mt_rand(000,999);
        $data["transfer_pic"] = "";

        $date1 = new DateTime($data['Checkin']."00:00:00");
        $date2 = new DateTime($data['Checkout']."00:00:00");

        $data["total"] = $data2["price"] * $date1->diff($date2)->d;
        if($data["Required"] == null){
            $data["Required"] = "";
        }
        
        $data["status"] = "PENDING";

        // dd($data);

        

        $cek = TransactionModel::create($data);
        if ($cek){
            $email = $data["Email"];
            Mail::send('email.transaction', ['data'=>$cek], function($m) use ($email){
                $m->from('admin@ganesha.com')->to($email)->subject("Pemesanan Ruangan");
            });
            Session::flash('notif', "Silahkan Cek Email Anda");
        }
        return redirect()->back();
    }
}
