<title>HotelInn</title>
@extends('home')
@section('content')


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="tm-top-bar-bg"></div>
<table class="table table-hover table-bordered" border="2">
    <tr>
        <td>Booking Number</td>
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
        <td>{{$item->guest_name}}</td>
        <td>{{$item->total_guest}}</td>
        <td>{{$item->roomtype_name}}</td>
        <td>{{$item->total_price}}</td>
        <td>
            @if ($item->booking_status == 0)
                <span class="badge badge-warning">WAITING</span></center>
            @else
                @if ($item->booking_status == -1)
                    <span class="badge badge-danger">CANCELED</span></center>
                @else
                    @if ($item->payment_status == 1)
                    <span class="badge badge-success">SUCCESS</span></center>
                    @endif
                @endif
            @endif
        </td>
        <td>
            @if ($item->booking_status==0)
            {{-- <form action="/checkout/{{$item->booking_number}}" method="get"> --}}
            <form action="/paywith" method="post">
                @csrf
                <input type="hidden" value="{{$item->booking_number}}" name="booknum">
                <button type="submit" class="btn btn-success">PAY</button>
            </form>

            <form action="/cancelbooking/{{$item->booking_number}}" method="get">
                <button type="submit" class="btn btn-danger">CANCEL</button>
            </form>
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection
