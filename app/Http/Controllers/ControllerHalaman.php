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
        $checkin = $request->input("checkin");
        $check = DB::table('booking')->select('*')->get();
        $room = DB::table('roomtype')->select('*')->get();
        $i = 0;
        $tipe = [];
        $ctrkosong = 0;


        foreach($room as $item){
            $i++;
            $tipe[$i] =$item->roomtype_capacity;
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
        }
        // for($i = 1 ; $i <= 5; $i++){
        //     echo $tipe[$i]."<br>";
        // }
        return view('components.findroom',[
            "tipe" => $tipe,
            "room" => $request->input('room'),
            "ctrkosong" => $ctrkosong
        ]);

    }
    function findroompage(){
        return view('components.findroom',[

        ]);
    }
    function changePassword(Request $request){
        $rules = [
            'old' => 'required',
            'new' => ['required','min:8','max:12','confirmed', new cekPassword]
        ];

        $customError = [
            'required' => 'Harus di isi ! '
        ];

        $this->validate($request,$rules,$customError);

        $old = $request->input('old');
        $new = $request->input('new');
        $confirm = $request->input('confirm');

        $cekOld = DB::table('guest')->select('*')->where('status',1)->where('password',$old)->get();

        if(count($cekOld)>0){
            if($new!=$old){
                DB::table('guest')->where('status',1)->update(["password"=>$new]);
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
                window.location.href='http://localhost:8000/login';
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
            'fullname' => 'required | max:24',
            'phone' => 'required | min:10',
            'password' => ['required','min:8','max:12','confirmed', new cekPassword],
            'email' => ['required', new cekEmail],
        ];

        $customError = [
            'required' => 'Harus di isi ! ',
            'numeric' => 'Harus berupa angka saja!',
            'alpha_num' => 'Harus alphanumeric!',
        ];

        $this->validate($request,$rules,$customError);

        $nama = $request->input('fullname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = $request->input('password');

        $checkEmail = DB::table('guest')->select('*')->where('email',$email)->get();
        $checkphone = DB::table('guest')->select('*')->where('phone',$phone)->get();

        if(count($checkEmail)==0 && count($checkphone)==0){
            $data = [
                'name' => $nama,
                'email' => $email,
                'phone' => $phone,
                'password' => $password,
                'status' => 0
            ];
            DB::table('guest')->insert($data);
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
        $checkMultipleLogin = DB::table('guest')->select('*')->where('phone',$phone)->where('password',$password)->where('status',0)->get();

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

    function topup(Request $request){
        $getguest = DB::table('guest')->select('*')->where('status',1)->get();
        $nominal = $request->input('nominal');
        $total = $getguest[0]->saldo + $nominal;

        if($nominal%100000!=0){
            echo
            "<script>
                alert('Nominal harus kelipatan Rp.100.000');
                window.location.href='http://localhost:8000/profile';
            </script>";
        }
        else{
            DB::table('guest')->where('status',1)->update(["saldo"=>$total]);
            echo
            "<script>
                alert('Berhasil topup');
                window.location.href='http://localhost:8000/profile';
            </script>";
        }
    }

    function book(Request $request){
        $getguest = DB::table('guest')->select('*')->where('status',1)->get();
        $room = $request->input('room');
        $getroom = DB::table('room')->select('*')->where('nama',$room)->get();

        $start = $request->input('start');
        $end = $request->input('end');

        $subStart = substr($start,5);
        $subStartMonth = substr($subStart,0,2);
        $subStartDay = substr($subStart,3,2);

        $subEnd = substr($end,5);
        $subEndMonth = substr($subEnd,0,2);
        $subEndDay = substr($subEnd,3,2);

        $jumlahHari = ((int)$subEndMonth - (int)$subStartMonth)*30+$subEndDay-$subStartDay;
        $harga = $jumlahHari*$getroom[0]->harga;

        if($getguest[0]->saldo - $harga <0){
            echo
            "<script>
                alert('Saldo anda tidak cukup!');
                window.location.href='http://localhost:8000/detailPage/{$getroom[0]->nama}';
            </script>";
        }
        else{
            $total = $getguest[0]->saldo - $harga;
            DB::table('guest')->where('status',1)->update(["saldo"=>$total]);

            $data = [
                'room' => $getroom[0]->nama,
                'guest' => $getguest[0]->nama,
                'harga' => $getroom[0]->harga,
                'link' => $getroom[0]->link,
                'hari' => $jumlahHari,
                'total' => $harga
            ];
            DB::table('history')->insert($data);

            echo
            "<script>
                alert('Berhasil book hotel!');
                window.location.href='http://localhost:8000/detailPage/{$getroom[0]->nama}';
            </script>";
        }
    }

    function promocode(){
        return view('components.promocode');
    }

    function bookRoom(Request $request){
        $getGuest = DB::table('guest')->select('*')->where('status',1)->get();
        $tipe1 = $request->input('tipe1');
        $tipe2 = $request->input('tipe2');
        $tipe3 = $request->input('tipe3');
        $tipe4 = $request->input('tipe4');
        $tipe5 = $request->input('tipe5');

        $data = [
            'booking_date' => date("Y/m/d"),
            'guest_email' => $getGuest[0]->email,
            'guest_name' => $getGuest[0]->name,
            'total_guest' => $totalGuest,
            'roomtype_id' => 5,
            'roomtype_name' => "Family Suite",
            'check_in' => date("Y/m/d"),
            'check_out' => date("Y/m/d"),
            'invoice_number' => 1,
            'total_price' => 15000000,
            'booking_status' => 0,
            'payment_status' => 0
        ];
        DB::table('booking')->insert($data);
    }

    function tambahPenginapan(Request $request){
        $rules = [
            'tipe' => 'required ',
            'harga' => 'required',
            'info' => 'required',
        ];
        $customError = [
            'required' => 'Harus di isi ! '
        ];

        $this->validate($request,$rules,$customError);

        $tipe = $request->input('tipe');
        $harga = $request->input('harga');
        $detail = $request->input('info');
        // $room = new RoomType;
        // // $room->id = 1;
        // $room->tipe_kamar = $tipe;
        // $room->harga_kamar = $harga;
        // $room->foto_kamar = "";
        // $room->detail_kamar = $detail;
        // $room->save();
        return view('components.admin');
    }
    function historyPage(Request $request){
        $data = DB::table('booking')->get();
        return view('components.history',["datas"=>$data]);
    }
    function cancelbook(Request $request,$booking_number){
        DB::table('booking')
        ->where('booking_number',$booking_number)
        ->update(['booking_status'=>-1]);
        return redirect("/history");
    }

}
