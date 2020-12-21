<title>HotelInn</title>
@extends('home')
@section('content')
<div class="tm-top-bar-bg"></div>
<table class="table table-hover table-bordered" border="2">
    <tr>
        <td>Booking Number</td>
        <td>Booking Date</td>
        <td>Guest Name</td>
        <td>Total Guest</td>
        <td>Room Type</td>
        <td>Total Price</td>
        <td>Booking Status</td>
        <td>Action</td>
    </tr>
    @foreach ($datas as $item)
    <tr>
        <td>{{$item->booking_number}}</td>
        <td>{{$item->booking_date}}</td>
        <td>{{$item->guest_name}}</td>
        <td>{{$item->total_guest}}</td>
        <td>{{$item->roomtype_name}}</td>
        <td>{{$item->total_price}}</td>
        <td>
            @if ($item->booking_status == 0)
            <center style="color: yellow">WAITING</center>
            @else
                @if ($item->booking_status == -1)
                    <center style="color: red">CANCELED</center>
                @else
                    @if ($item->payment_status == 1)
                    <center style="color: green">SUCCESS</center>
                    @endif
                @endif
            @endif
        </td>
        <td>
            @if ($item->booking_status==0)
                <button class="button-box btn-outline-success"><a href="/checkout/{{$item->booking_number}}">PAY</a></button>
                <button class="button-box btn-outline-danger"><a href="/cancelbooking/{{$item->booking_number}}">CANCEL</a></button>
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection
