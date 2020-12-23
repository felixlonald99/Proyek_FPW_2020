<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Rules\cekEmail;
use App\Rules\cekPassword;
use Illuminate\Support\Facades\DB;
use App\Account;
use App\BookingModel;
use App\Room;
use App\RoomType;
use App\Guest;
use App\GuestModel;
use App\PromoModel;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;

class ControllerHalaman extends Controller
{
    function loginPage(){
        return view ('components.login');
    }
    function registerPage(){
        return view ('components.register');
    }

    function adminPage(){
        return view ('components.admin');
    }

    function homePage(){
        $guest = DB::table('guest')->select('*')->where('status',1)->get();

        if(count($guest)>0){
            return view('components.home',['guestLogin'=>$guest]);
        }
        else{
            return view('components.home');
        }

    }

    function findRoom(Request $request){
        $check = DB::table('booking')->select('*')->get();

        $i = 0;
        $tipe = [];
        $ctrkosong = 0;

        for($i = 0; $i <= 5; $i++ ){
            $tipe[$i] = 0;
        }

        for($i = 1; $i <= 5; $i++ ){
            $room = DB::table('room')->select('*')->where("roomtype_id",$i)->get();
            $tipe[$i] = count($room);
        }

        foreach($check as $item){
            $tglcheckin= Carbon::createFromDate($item->check_in)->format('Y-m-d');
            $now = Carbon::createFromDate($request->input("checkin"))->format('Y-m-d');
            $night = Carbon::createFromDate($request->input("checkin"))->addDays($request->input("night"))->format('Y-m-d');
            $tglantara = Carbon::createFromDate($item->check_in)->format('Y-m-d');
            $tglantara2 = Carbon::createFromDate($item->check_out)->format('Y-m-d');

            if($now >= $tglcheckin || $night > $tglantara && $night < $tglantara2){
                for($i = 1 ; $i <= 5; $i++){
                    if($item->roomtype_id == $i){
                        $tipe[$i]--;
                    }
                }
            }

            $tglcheckout= Carbon::createFromDate($item->check_out)->format('Y-m-d');
            if($tglcheckout <= $now){
                for($i = 1 ; $i <= 5; $i++){
                    if($item->roomtype_id == $i){
                        $tipe[$i]++;
                    }
                }
            }

            $ctr = 0 ;
            $ctrkosong = 0;

            for($i = 1 ; $i <= 5; $i++){
                if($tipe[$i] < $request->input('room')){
                    $ctr++;
                }
            }
            if($ctr == 5){
                $ctrkosong = 1;
            }

            //isi room capacity
            $cap = [];
            for($i = 0; $i <= 5; $i++ ){
                $cap[$i] = 0;
            }

            for($i = 1; $i <= 5; $i++){
                $roomcap = DB::table('roomtype')->select('*')->where("roomtype_id",$i)->get();
                foreach($roomcap as $item){
                    $cap[$i] = $item->roomtype_capacity;
                }
            }
        }
        return view('components.findroom',[
            "tipe" => $tipe,
            "room" => $request->input('room'),
            "ctrkosong" => $ctrkosong,
            "night" => $request->input("night"),
            "room" => $request->input("room"),
            "checkin" =>$request->input("checkin"),
            "cap" => $cap
        ]);

    }
    function findroompage(){
        return view('components.findroom',[

        ]);
    }
    function paywith(Request $request){
        $booking_number = $request->input('booknum');

        $data = DB::table('booking')->where('booking_number',$booking_number)->get();
        foreach($data as $item){
            $usepromo = $item->use_promo;
        }

        return view('components.paywith',[
            'number' => $booking_number,
            'datas' => $data,
            'use_promo' => $usepromo
        ]);
    }
    public function cekpromocode(Request $request){
        $booking_number = $request->input('booknum');
        $kode = $request->input('promocode');

        $cekkode = DB::table('promo')->where('nama_promo',$kode)->get();
        $potongan = 0;
        foreach($cekkode as $item){
            $potongan = $item->nominal_potongan;
        }

        $data = DB::table('booking')->where('booking_number',$booking_number)->get();
        $totalbefore = 0;
        foreach($data as $item){
            $totalbefore = $item->total_price;
        }


        if(count($cekkode) > 0){
            $totalafter=$totalbefore-$potongan;
            DB::table('booking')->where('booking_number',$booking_number)->update([
                'total_price' =>$totalafter,
                'use_promo'=> 1
            ]);


            $data = DB::table('booking')->where('booking_number',$booking_number)->get();
            foreach($data as $item){
                $usepromo = $item->use_promo;
            }
            return view('components.paywith',[
                'number' => $booking_number,
                'datas' => $data,
                'use_promo' => $usepromo
            ]);
        }

    }
    function paycash(Request $request){
        DB::table('booking')->where('booking_number',$request->input('booknum'))->update([
            'payment_status'=> 1,
            'booking_status'=>1
        ]);

        return redirect("/history");
    }
    function changePassword(Request $request){
        $rules = [
            'old' => 'required',
            'password' => ['required','min:8','max:12','confirmed', new cekPassword]
        ];

        $customError = [
            'required' => 'Harus di isi ! '
        ];

        $this->validate($request,$rules,$customError);

        $old = $request->input('old');
        $password = $request->input('password');

        $cekOld = DB::table('guest')->select('*')->where('status',1)->where('password',$old)->get();

        if(count($cekOld)>0){
            if($password!=$old){
                DB::table('guest')->where('status',1)->update(["password"=>$password]);
                echo
                "<script>
                    alert('Password berhasil diganti!')
                    window.location.href='http://localhost:8000/profile';
                </script>";
            }
            else{
                echo
                "<script>
                    alert('Password baru tidak boleh sama dengan password lama!')
                    window.location.href='http://localhost:8000/profile';
                </script>";
            }
        }
        else{
            echo
            "<script>
                alert('Password lama salah!')
                window.location.href='http://localhost:8000/profile';
            </script>";
        }

    }

    function profilePage(){
        $guest = DB::table('guest')->select('*')->where('status',1)->get();
        return view('components.profile',['guestLogin' => $guest]);
    }

    function logout(){
        DB::table('guest')->where('status',1)->update(["status"=>0]);
        Cookie::queue(Cookie::forget('cookieLogin'));
        echo
            "<script>
                window.location.href='http://localhost:8000/home';
            </script>";
    }

    function detailPage($nama){
        $room = DB::table('room')->select('*')->get();

        foreach ($room as $hotel){
            if($hotel->nama==$nama){
                return view('components.detailPemesanan',['hotel' => $hotel]);
            }
        }
    }

    function prosesRegister(Request $request){
        $rules = [
            'fullname' => 'required |alpha| max:24',
            'phone' => 'required | numeric |min:10',
            'password' => ['required','min:8','max:12','confirmed', new cekPassword],
            'email' => ['required', new cekEmail],
        ];

        $customError = [
            'required' => 'Harus di isi ! ',
            'numeric' => 'Harus berupa angka saja!',
            'alpha' => 'Nama tidak boleh mengandung angka!',
        ];

        $this->validate($request,$rules,$customError);

        $nama = $request->input('fullname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = $request->input('password');
        $year = $request->input('year');
        $month = $request->input('month');
        $day = $request->input('day');

        $checkEmail = DB::table('guest')->select('*')->where('email',$email)->get();
        $checkphone = DB::table('guest')->select('*')->where('phone',$phone)->get();


        if(count($checkEmail)==0 && count($checkphone)==0){
            $guest = new GuestModel();

            $guest->name = $nama;
            $guest->email = $email;
            $guest->phone = $phone;
            $guest->password = $password;
            $guest->saldo = 0;
            $guest->status = 0;
            $guest->birthdate = $year."-".$month."-".$day;
            $guest->save();

            return view('components.login');
        }
        else if(count($checkEmail)>0){
            return view('components.register',['errorEmail' => "Email sudah digunakan!"]);
        }
        else if(count($checkphone)>0){
            return view('components.register',['errorNoHP' => "Nomor HP sudah digunakan!"]);
        }
    }

    function prosesLogin(Request $request){
        $phone = "+".$request->input('phone');
        $password = $request->input('password');

        $checkguest = DB::table('guest')->select('*')->where('phone',$phone)->where('password',$password)->get();

        if($phone=="admin" && $password=="admin"){
            echo
            "<script>
                window.location.href='http://localhost:8000/admin';
            </script>";
        }
        else if(count($checkguest)>0){
            DB::table('guest')->where('phone',$phone)->update(["status"=>1]);

            foreach($checkguest as $item){
                $emaillogin = $item->email;
            }

            $userCookie = array(
                "emaillogin" => $emaillogin
            );

            $userCLogin[] = $userCookie;
            $cookie = json_encode($userCLogin);
            Cookie::queue("cookieLogin",$cookie,120);

            return redirect('/home');
        }
        else{
            echo
            "<script>
                alert('Mobile number atau Password salah!');
                window.location.href='http://localhost:8000/login';
            </script>";
        }
    }

    function tambahroom(Request $request){
        $rules = [
            'alamat' => 'required | max:50',
            'nama' => 'required|max:20|regex:/^[\pL\s\-]+$/u',
            'link' => 'required',
        ];
        $customError = [
            'required' => 'Harus di isi ! ',
            'alpha' => 'Hanya boleh alphabet',
        ];

        $this->validate($request,$rules,$customError);

        $nama = $request->input('nama');
        $harga = $request->input('harga');
        $link = $request->input('link');
        $alamat = $request->input('alamat');

        $temp = [
            'nama' => $nama,
            'harga' => $harga,
            'alamat' => $alamat,
            'link' => $link
        ];

        DB::table('room')->insert($temp);

        return view('components.admin');
    }

    function promocode(){
        $listpromo = PromoModel::All();

        return view('components.promocode',[
            "listpromo" => $listpromo
        ]);
    }

    function bookRoomGuest(Request $request){
        $getGuest = DB::table('guest')->select('*')->where('status',1)->get();
        $tipe1 = $request->input('tipe1');
        $tipe2 = $request->input('tipe2');
        $tipe3 = $request->input('tipe3');
        $tipe4 = $request->input('tipe4');
        $tipe5 = $request->input('tipe5');
        $nights = $request->input('nights');
        $totalBookRooms = $tipe1+$tipe2+$tipe3+$tipe4+$tipe5;
        $checkin = $request->input('checkin');

        $checkinReplace = str_replace('-', '/', $checkin);
        $checkout = date('Y-m-d',strtotime($checkinReplace . "+".$nights." days"));

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
            $booking->guest_email = $getGuest[0]->email;
            $booking->guest_name = $getGuest[0]->name;
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
                'guest_email' => $getGuest[0]->email,
                'total_price' => 0,
                'payment_status' => 0
            ];
            DB::table('invoice')->insert($data);
        }

        $getBooking = DB::table('booking')->select('*')->where('guest_email',$getGuest[0]->email)->get();
        return view('components.history',['datas'=>$getBooking]);
    }

    function historyPage(Request $request){
        $getGuest = DB::table('guest')->select('*')->where('status',1)->get();
        $getBooking = DB::table('booking')->select('*')->where('guest_email',$getGuest[0]->email)->get();
        return view('components.history',['datas'=>$getBooking]);
    }
    function cancelbook(Request $request,$booking_number){
        DB::table('booking')
        ->where('booking_number',$booking_number)
        ->update(['booking_status'=>-1]);
        return redirect("/history");
    }

}
