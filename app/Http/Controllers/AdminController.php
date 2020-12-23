<?php

namespace App\Http\Controllers;

use App\BookedRoomModel;
use App\BookingModel;
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
        $listbooking = DB::table('booking')->paginate(10);
        return view('admin.masterbooking',[
            'listbooking' => $listbooking,
        ]);
    }

    function detailbooking(Request $request){
        $bookingnumber = $request->input('booking_number');
        // $data = DB::table('booking')->where('booking_number', $bookingnumber)->first();
        $data = BookingModel::find($bookingnumber);
        //dd($data->roomtype_id);

        // $room = DB::table('room')->where('roomtype_id', $data->roomtype_id)->get(); //return all rooms same type
        $exclude = DB::table("bookedroom")->select('room_number')->where('check_in', $data->check_in)->get()->toarray();

        $array_exclude = array();
        foreach ($exclude as $ex){
            array_push($array_exclude, $ex->room_number);
        }

        $room = DB::table("room")->select('room_number')->where('roomtype_id', $data->roomtype_id)->get()->toarray();
        $array_room = array();
        foreach ($room as $r){
            array_push($array_room, $r->room_number);
        }

        $filtered = array_diff($array_room, $array_exclude);
        // dd($filtered);

        return view('admin.detailbooking',[
            'data'=>$data,
            'room'=>$filtered,
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
        $namaGuest =$request->input('nama');

        if(count($getGuest)>0){
            $emailGuest =$getGuest[0]->email;
        }
        else{
            $emailGuest ="guest@guest.com";
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

            $booking = new BookingModel();
            $booking->booking_number = count($getBookingNumber)+1;
            $booking->guest_email = $emailGuest;
            $booking->guest_name = $namaGuest;
            $booking->roomtype_id = $roomTipe;
            $booking->roomtype_name = $getRoom[0]->roomtype_name;
            $booking->room_number = 0;
            $booking->check_in = $checkin;
            $booking->check_out = $checkout;
            $booking->nights = $nights;
            $booking->total_price = $nights*$getRoom[0]->roomtype_price;
            $booking->booking_status = 0;
            $booking->payment_status = 0;
            $booking->save();

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

    function changepaymentstatus(Request $request){
        $bookingnumber = $request->input('booking_number');
        $payment_status = $request->input('payment_status');
        $payment_method = $request->input('paymentmethod');

        $data = BookingModel::find($bookingnumber);
        $data->payment_method = $payment_method;
        $data->save();

        if ($payment_status==0) {
            $data = BookingModel::find($bookingnumber);
            $data->payment_status = 1;
            $data->save();
        } else if ($payment_status==1) {
            $data = BookingModel::find($bookingnumber);
            $data->payment_status = 0;
            $data->save();
        }
        return back()->withInput();
    }

    function assignroom(Request $request){ //check in tamu
        $bookingnumber = $request->input('booking_number');
        $roomnumber = $request->input('roomnumber');

        $data = BookingModel::find($bookingnumber);

        if ($data->payment_status==0) {
            return back()->with('status', 'BELUM MELAKUKAN PAYMENT!');
        }

        $data->room_number = $roomnumber;
        $data->booking_status = 1;
        $data->save();

        $bookedroom = new BookedRoomModel();
        $bookedroom->booking_number = $bookingnumber;
        $bookedroom->guest_email = $data->guest_email;
        $bookedroom->guest_name = $data->guest_name;
        $bookedroom->check_in = $data->check_in;
        $bookedroom->check_out = $data->check_out;
        $bookedroom->room_number = $roomnumber;
        $bookedroom->save();

        return back()->withInput();
    }

    function setbookingpending(Request $request){
        $bookingnumber = $request->input('booking_number');
        $data = BookingModel::find($bookingnumber);

        if ($data->payment_status==0) {
            return back()->with('status', 'BELUM MELAKUKAN PAYMENT!');
        }

        $data->booking_status = 0;
        $data->save();
        return back()->withInput();
    }

    function setbookingcheckedin(Request $request){
        $bookingnumber = $request->input('booking_number');
        $data = BookingModel::find($bookingnumber);

        if ($data->payment_status==0) {
            return back()->with('status', 'BELUM MELAKUKAN PAYMENT!');
        }

        $data->booking_status = 1;
        $data->save();
        return back()->withInput();
    }

    function setbookingcheckedout(Request $request){
        $bookingnumber = $request->input('booking_number');
        $data = BookingModel::find($bookingnumber);

        if ($data->payment_status==0) {
            return back()->with('status', 'BELUM MELAKUKAN PAYMENT!');
        }

        $data->booking_status = 2;
        $data->save();
        return back()->withInput();
    }

    function insertpromo(Request $request){
        $cekpromo = PromoModel::All()->where('nama_promo',$request->input('promocode'));
        if(count($cekpromo) > 0){
            return redirect('/masterpromopage')->with('status', 'Promo Code is already exists');
        }
        else{
            $promo = new PromoModel();
            $promo->id=0;
            $promo->nama_promo = $request->input('promocode');
            $promo->nominal_potongan = $request->input('nominal');
            $promo->minimal_transaksi = $request->input('minimum');
            $promo->save();

            return redirect('/masterpromopage')->with('status', 'Promo Code Successfully Added');
        }
    }
    function deletepromo(Request $request){
        DB::table('promo')->where('nama_promo',$request->input('idDelete'))->delete();
        return redirect('/masterpromopage')->with('status', 'Promo Code deleted');
    }
    function addservicepage(Request $request){
        $data = DB::table('booking')->where('booking_status',1)->get();
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
        $data = DB::table('booking')->where('booking_status',1)->get();
        $ctr=0;
        foreach ($data as $key ) {
            $ctr++;
            if($request->input('booknumber') == $ctr){
                $bookingnumber = $key->booking_number;
            }
        }
        $service_name = $request->input('servicename');
        $serviceprice = $request->input('service_price');
        // dd($bookingnumber);
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

    // =========================== FILTER PAYMENT ===========================
    function filterpaymentpending(){
        $listbooking = DB::table('booking')->where('payment_status',0)->paginate(10);
        return view('admin.masterbooking',[
            'listbooking' => $listbooking,
        ]);
    }

    function filterpaymentpaid(){
        $listbooking = DB::table('booking')->where('payment_status',1)->paginate(10);
        return view('admin.masterbooking',[
            'listbooking' => $listbooking,
        ]);
    }

    // =========================== FILTER STATUS ===========================
    function filterstatuspending(){
        $listbooking = DB::table('booking')->where('booking_status',0)->paginate(10);
        return view('admin.masterbooking',[
            'listbooking' => $listbooking,
        ]);
    }

    function filterstatuscheckedin(){
        $listbooking = DB::table('booking')->where('booking_status',1)->paginate(10);
        return view('admin.masterbooking',[
            'listbooking' => $listbooking,
        ]);
    }

    function filterstatuscheckedout(){
        $listbooking = DB::table('booking')->where('booking_status',2)->paginate(10);
        return view('admin.masterbooking',[
            'listbooking' => $listbooking,
        ]);
    }

    function bookedroompage(){
        $listbooking = DB::table('bookedroom')->paginate(10);
        return view('admin.masterbookedroom',[
            'listbooking' => $listbooking,
        ]);
    }


    function filtertanggal(Request $request){
        $date = $request->input('date');
        $data = DB::table('bookedroom')->where('check_in', $date)->paginate(10);
        return view('admin.masterbookedroom',[
            'listbooking' => $data,
        ]);
    }

    function invoice(){
        $invoice = DB::table('invoice')->paginate(10);
        return view('admin.masterinvoice',[
            'invoice' => $invoice,
        ]);
    }
    function detailinvoice(Request $request){

        $invoice = DB::table('invoice')->paginate(10);
        return view('admin.masterinvoice',[
            'invoice' => $invoice,
        ]);
    }

}
