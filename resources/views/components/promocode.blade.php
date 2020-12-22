<title>HotelInn</title>
@extends('home')
@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="tm-top-bar-bg"></div>

<div class="container">
    <table class="table">
        @isset($listpromo)
        @foreach($listpromo as $item)
                <tr>
                    <td><img src="{{ url("/templateweb/img/voucher.png")}}" style="width:200px;height:170px;"></td>
                    <td>
                        <h1>{{$item->nama_promo}}</h1><br>
                        <h4>GET NOMINAL DISCOUNT : Rp {{$item->nominal_potongan}}</h4><br>
                        <h4 style="font-size:10pt">with minimum purchase : Rp {{$item->minimal_transaksi}}</h4>
                    </td>
                </tr>
            <br>
        @endforeach
        @endisset
    </table>
</div>
@endsection
