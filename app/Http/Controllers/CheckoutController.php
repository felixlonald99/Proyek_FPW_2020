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
			'currency' => 'USD',
			'description' => 'Payment From '.$name,
			'payment_method_types' => ['card'],
		]);
        $intent = $payment_intent->client_secret;

		return view('checkout.credit-card',compact('intent'),['datas'=>$data,'number'=>$booking_number]);

    }

    public function afterPayment(Request $request,$booking_number)
    {
        DB::table('booking')
        ->where('booking_number',$booking_number)
        ->update(['booking_status'=>1,'payment_status'=>1,'payment_method'=>"MIDTRANS"]);
        return redirect("/history");
    }
}
