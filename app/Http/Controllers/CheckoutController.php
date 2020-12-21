<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Account;
use App\BookingModel;
use App\Room;
use App\RoomType;
use App\Guest;
class CheckoutController extends Controller
{
    public function checkout($booking_number)
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51GuFJmKXe5VFGA8ZdHbRBGZZiVUlrDnoR0KtdIghwqet0v0M0ZtY9aoWx92nJuAaM7YOhgNMmpcNAguxWOEDvFG9004xuhVpZb');
        $data = DB::table('booking')->where('booking_number',$booking_number)->get();
        foreach ($data as $key) {
            $amount = $key->total_price;
            $name = $key->guest_name;
        }


        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'IDR',
			'description' => 'Payment From '.$name,
			'payment_method_types' => ['card'],
		]);
        $intent = $payment_intent->client_secret;

		return view('checkout.credit-card',compact('intent'),['datas'=>$data,'number'=>$booking_number]);

    }

    public function cekpromocode(Request $request,$booking_number){
        $kode = $request->input('promocode');

        $cekkode = DB::table('promo')->where('nama_promo',$kode)->get();
        foreach($cekkode as $item){
            $potongan = $item->nominal_potongan;
        }

        \Stripe\Stripe::setApiKey('sk_test_51GuFJmKXe5VFGA8ZdHbRBGZZiVUlrDnoR0KtdIghwqet0v0M0ZtY9aoWx92nJuAaM7YOhgNMmpcNAguxWOEDvFG9004xuhVpZb');
        $data = DB::table('booking')->where('booking_number',$booking_number)->get();
        foreach ($data as $key) {
            $amount = $key->total_price;
            $name = $key->guest_name;
        }


        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'IDR',
            'description' => 'Payment From '.$name,
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

        if($cekkode){
            return view('checkout.credit-card',compact('intent'),[
                'datas'=>$data,
                'number'=>$booking_number,
                'potongan'=>$potongan
            ]);
        }
        else{
            echo "<alert>PROMO CODE INVALID";

            return view('checkout.credit-card',compact('intent'),[
                'datas'=>$data,
                'number'=>$booking_number
            ]);
        }
    }
    public function afterPayment(Request $request,$booking_number)
    {
        DB::table('booking')
        ->where('booking_number',$booking_number)
        ->update(['booking_status'=>1,'payment_status'=>1]);
        $data = DB::table('booking')->where('booking_number',$booking_number)->get();
        foreach ($data as $key ) {
            $email = $key->guest_email;
            $nama = $key->guest_name;
            $in = $key->check_in;
            $out = $key->check_out;
            $roomnum = $key->room_number;
        }
        DB::table('bookedroom')->insert(
            array(
                "booking_number" => $booking_number,
                "guest_email" => $email,
                "guest_name" => $nama,
                "check_in" => $in,
                "check_out" => $out,
                "room_number" => $roomnum,
            )
        );
        return redirect("/history");
    }
}
