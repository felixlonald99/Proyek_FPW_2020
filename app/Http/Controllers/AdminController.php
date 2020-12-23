<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDO;
use App\PromoModel;
use App\ServiceModel;
use App\InvoiceModel;
use App\Rules\cekEmail;

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
    function addnewbookingpage(){
        return view('admin.addnewbookingpage',[
        ]);
    }
    function bookRoom(Request $request){
        $rules = [
            'email' => ['required', new cekEmail],
            'nama' => 'required | alpha | max:24'
        ];
        $customError = [
            'required' => 'Harus di isi',
            'alpha'=>'Nama tidak boleh mengandung angka'
        ];
        $this->validate($request,$rules,$customError);

        $getGuest = DB::table('guest')->select('*')->where('email',$request->input('email'))->get();
        $tipe1 = $request->input('tipe1');
        $tipe2 = $request->input('tipe2');
        $tipe3 = $request->input('tipe3');
        $tipe4 = $request->input('tipe4');
        $tipe5 = $request->input('tipe5');
        $nights = $request->input('night');
        $totalBookRooms = $tipe1+$tipe2+$tipe3+$tipe4+$tipe5;
        $checkin = date('Y-m-d');

        $checkinReplace = str_replace('-', '/', $checkin);
        $checkout = date('Y-m-d',strtotime($checkinReplace . "+".$nights." days"));

        $emailGuest = "";
        $namaGuest = "";
        if(count($getGuest)>0){
            $emailGuest =$getGuest[0]->email;
            $namaGuest =$getGuest[0]->name;
        }
        else{
            $emailGuest ="guest@guest.com";
            $namaGuest =$request->input('nama');
        }

        for ($i=0; $i < $totalBookRooms; $i++) {
            $getBookingNumber = DB::table('booking')->select('*')->get();
            $getInvoice = DB::table('invoice')->select('*')->get();
            $getRoom = "";
            $roomTipe = 0;

            if($tipe1!=0){
                $tipe1--;
                $roomTipe=1;
            }
            else if($tipe2!=0){
                $tipe2--;
                $roomTipe=2;
            }
            else if($tipe3!=0){
                $tipe3--;
                $roomTipe=3;
            }
            else if($tipe4!=0){
                $tipe4--;
                $roomTipe=4;
            }
            else if($tipe5!=0){
                $tipe5--;
                $roomTipe=5;
            }

            $getRoom = DB::table('roomtype')->select('*')->where('roomtype_id',$roomTipe)->get();
            $getRoomNumber = DB::table('room')->select('*')->where('roomtype_id',$roomTipe)->where('room_status',0)->get();

            $data = [
                'booking_number' => count($getBookingNumber)+1,
                'guest_email' => $emailGuest,
                'guest_name' => $namaGuest,
                'roomtype_id' => $roomTipe,
                'roomtype_name' => $getRoom[0]->roomtype_name,
                'room_number' => 0,
                'check_in' => $checkin,
                'check_out' => $checkout,
                'nights' => $nights,
                'total_price' => $nights*$getRoom[0]->roomtype_price,
                'booking_status' => 0,
                'payment_status' => 0
            ];
            DB::table('booking')->insert($data);
            DB::table('room')->where('room_number',$getRoomNumber[0]->room_number)->update(['room_status'=>1]);

            $data = [
                'invoice_number' => count($getInvoice)+1,
                'booking_number' => count($getBookingNumber)+1,
                'guest_email' =>$emailGuest,
                'total_price' => 0,
                'payment_status' => 0
            ];
            DB::table('invoice')->insert($data);
        }

        echo
            "<script>
                alert('Berhasil menambahkan booking');
                window.location.href='http://localhost:8000/addnewbookingpage';
            </script>";
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
