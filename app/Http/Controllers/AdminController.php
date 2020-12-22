<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDO;
use App\PromoModel;
use App\ServiceModel;
use App\InvoiceModel;

class AdminController extends Controller
{
    public function adminlogout(Request $request){
        $request->session()->forget('admin');
        return redirect('admin');
    }

    public function adminpage(){
        if(Session::has('admin')){
            return redirect('masteruserpage');
        }
        return view('admin.adminlogin');
    }

    public function dologinadmin(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        if($username == "admininn" && $password == "hotelinn"){
            Session::put('admin','admin');
            return redirect('masteruserpage');
        }
        return redirect('admin');
    }

    function masteruserpage(){
        $listusers = DB::table('guest')->paginate(10);
        return view('admin.masteruser',[
            'listusers' => $listusers,
        ]);
    }
    function masterpromopage(){
        $promo = PromoModel::All();

        return view('admin.masterpromo',[
            "promo" => $promo
        ]);
    }
    function masterbookingpage(){
        return view('admin.masterbooking',[

        ]);
    }
    function insertpromo(Request $request){
        $cekpromo = PromoModel::All()->where('nama_promo',$request->input('promocode'));
        if(count($cekpromo) > 0){
            echo
            "<script>
                alert('Promo Code is already exists');
                window.location.href='http://localhost:8000/masterpromopage';
            </script>";
        }
        else{
            $promo = new PromoModel();
            $promo->id=0;
            $promo->nama_promo = $request->input('promocode');
            $promo->nominal_potongan = $request->input('nominal');
            $promo->minimal_transaksi = $request->input('minimum');
            $promo->save();

            echo
            "<script>
                alert('Promo Code Successfully Added');
                window.location.href='http://localhost:8000/masterpromopage';
            </script>";
        }
    }
    function deletepromo(Request $request){
        DB::table('promo')->where('nama_promo',"TVLK100")->delete();
        echo
            "<script>
                alert('Promo Code deleted');
                window.location.href='http://localhost:8000/masterpromopage';
            </script>";
    }
    function addservicepage(Request $request){
        $data = DB::table('booking')->get();
        $daftarmenu = [
            "Nasi Goreng","Mie Goreng","Nasi Pecel Ayam","Nasi Empal","Mie Pangsit",
            "Nasi Kuning","Chicken Karrage","Nasi Kari","Batagor","Coto Makassar",
            "Air Mineral","Fanta","Sprite","Coca Cola","Pulpy Orange",
            "Es Teh Manis","Es Teh Tawar","Teh Manis Hangat","Teh Tawar Hangat","Frestea",
        ];
        $harga = [
            "32000","27000","25000","23000","25000",
            "30000","20000","30000","20000","28000",
            "5000","6500","6500","6500","7500",
            "5000","3000","5000","3000","8000",
        ];
        $menu = array(
            "list" => $daftarmenu,
            "harga" => $harga
        );
        return view('admin.addservice',["datas"=>$data,"num"=>0,"menu"=>$menu]);
    }
    function insertservice(Request $request){
        $rules = [
            'booknumber' => 'required',
            'servicename' => 'required',
            'service_price' => 'required'
        ];
        $customError = [
            'required' => 'Harus di Pilih !!',
            'service_price.required'=>'Tidak Boleh Kosong'
        ];
        $this->validate($request,$rules,$customError);
        $bookingnumber = $request->input('booknumber');
        $service_name = $request->input('servicename');
        $serviceprice = $request->input('service_price');
        $serve = new ServiceModel();
        $serve->booking_number = $bookingnumber;
        $serve->service_name = $service_name;
        $serve->service_price = $serviceprice;
        $serve->save();
        $upd = InvoiceModel::All()->where('booking_number',$bookingnumber);
        foreach ($upd as $key ) {
            $totalprice = $key->total_price;
        }
        $totalprice+=$serviceprice;
        DB::table('invoice')->where('booking_number',$bookingnumber)->update(
            array(
                "total_price" => $totalprice
            )
        );
        return redirect("/addservicepage");
    }
}
