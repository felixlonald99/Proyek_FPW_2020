<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Rules\cekEmail;
use App\Rules\cekPassword;
use Illuminate\Support\Facades\DB;


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
        $user = DB::table('user')->select('*')->where('status',1)->get();
        $room = DB::table('room')->select('*')->get();

        if(count($user)>0){
            return view('components.home',['room' => $room,'userLogin'=>$user]);
        }
        else{
            return view('components.home',['room' => $room]);
        }

    }

    function profilePage(){
        $user = DB::table('user')->select('*')->where('status',1)->get();

        $history = DB::table('history')->select('*')->where('user',$user[0]->nama)->get();
        return view('components.profile',['userLogin' => $user,'history'=>$history]);
    }

    function logout(){
        DB::table('user')->where('status',1)->update(["status"=>0]);
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
            'fullname' => 'required | max:24',
            'mobilenumber' => 'required | numeric',
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
        $mobilenumber = $request->input('mobilenumber');
        $password = $request->input('password');

        $checkEmail = DB::table('user')->select('*')->where('email',$email)->get();
        $checkMobilenumber = DB::table('user')->select('*')->where('mobilenumber',$mobilenumber)->get();

        if(count($checkEmail)==0 && count($checkMobilenumber)==0){
            $data = [
                'nama' => $nama,
                'email' => $email,
                'mobilenumber' => $mobilenumber,
                'password' => $password,
                'saldo' => 0,
                'status' => 0
            ];
            DB::table('user')->insert($data);
            return view('components.login');
        }
        else if(count($checkEmail)>0){
            return view('components.register',['errorEmail' => "Email sudah digunakan!"]);
        }
        else if(count($checkMobilenumber)>0){
            return view('components.register',['errorNoHP' => "Nomor HP sudah digunakan!"]);
        }
    }

    function prosesLogin(Request $request){
        $mobilenumber = $request->input('mobilenumber');
        $password = $request->input('password');

        $checkUser = DB::table('user')->select('*')->where('mobilenumber',$mobilenumber)->where('password',$password)->get();
        $checkMultipleLogin = DB::table('user')->select('*')->where('mobilenumber',$mobilenumber)->where('password',$password)->where('status',0)->get();

        if($mobilenumber==888 && $password==888){
            echo
            "<script>
                window.location.href='http://localhost:8000/admin';
            </script>";
        }
        else if(count($checkUser)>0 && count($checkMultipleLogin)>0){
            DB::table('user')->where('mobilenumber',$mobilenumber)->update(["status"=>1]);

            return redirect('/home');
        }
        else if (count($checkUser)>0 && count($checkMultipleLogin)==0){
            echo
            "<script>
                alert('Akun ini sudah login!');
                window.location.href='http://localhost:8000/login';
            </script>";
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
        $getUser = DB::table('user')->select('*')->where('status',1)->get();
        $nominal = $request->input('nominal');
        $total = $getUser[0]->saldo + $nominal;

        if($nominal%100000!=0){
            echo
            "<script>
                alert('Nominal harus kelipatan Rp.100.000');
                window.location.href='http://localhost:8000/profile';
            </script>";
        }
        else{
            DB::table('user')->where('status',1)->update(["saldo"=>$total]);
            echo
            "<script>
                alert('Berhasil topup');
                window.location.href='http://localhost:8000/profile';
            </script>";
        }
    }

    function book(Request $request){
        $getUser = DB::table('user')->select('*')->where('status',1)->get();
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

        if($getUser[0]->saldo - $harga <0){
            echo
            "<script>
                alert('Saldo anda tidak cukup!');
                window.location.href='http://localhost:8000/detailPage/{$getroom[0]->nama}';
            </script>";
        }
        else{
            $total = $getUser[0]->saldo - $harga;
            DB::table('user')->where('status',1)->update(["saldo"=>$total]);

            $data = [
                'room' => $getroom[0]->nama,
                'user' => $getUser[0]->nama,
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
}
