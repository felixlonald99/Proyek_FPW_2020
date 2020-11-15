<title>HotelInn</title>
@extends('home')
@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto:wght@500&display=swap" rel="stylesheet">

<style>
    #boxHotel{
        width: 1050px;
        height: 550px;
        border: 2px solid #ccc;
        margin-bottom: 50px;
        -webkit-transition: 0.5s ease;
        background-color:darkslategray;
    }
    button{
        width: 100px;
        height: 30px;
        background-color: darkslategray;
        border: none;
        color: white;
        font-size: 30px;
        font-family: 'Quicksand', sans-serif;
        font-weight: ;
        transition: 0.5s;
    }
    #pageTitle{
        position: absolute;
        left:625px;
        top:200px;
        width: 600px;
        height: 50px;
        font-size:30px;
        font-weight:bold;
        font-family: 'Roboto', sans-serif;
    }
    input[type=submit] {
        width: 100px;
        background-color: tomato;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size:20px;
        transition:0.5s;
    }
    input:hover[type=submit]{
        cursor:pointer;
        background-color: white;
        color:tomato;
    }
    input[type=number], select {
        width: 50%;
        padding: 10px 10px;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size:18px;
        opacity: 1;
    }
    #profileTitle{
        position: absolute;
        left:320px;
        top:320px;
        width: 600px;
        height: 50px;
        font-size:30px;
        font-weight:bold;
        color:white;
        font-family: 'Roboto', sans-serif;
    }
    #profileName{
        position: absolute;
        left:200px;
        top:450px;
        width: 600px;
        height: 50px;
        font-size:20px;
        font-weight:bold;
        color:white;
        font-family: 'Roboto', sans-serif;
    }
    #profileEmail{
        position: absolute;
        left:200px;
        top:500px;
        width: 600px;
        height: 50px;
        font-size:20px;
        font-weight:bold;
        color:white;
        font-family: 'Roboto', sans-serif;
    }
    #profileMobilenumber{
        position: absolute;
        left:200px;
        top:550px;
        width: 600px;
        height: 50px;
        font-size:20px;
        font-weight:bold;
        color:white;
        font-family: 'Roboto', sans-serif;
    }
    #profileSaldo{
        position: absolute;
        left:200px;
        top:600px;
        width: 600px;
        height: 50px;
        font-size:20px;
        font-weight:bold;
        color:white;
        font-family: 'Roboto', sans-serif;
    }
    #profiletopUp{
        position: absolute;
        left:200px;
        top:700px;
        width: 600px;
        height: 50px;
        font-size:20px;
        font-weight:bold;
        color:white;
        font-family: 'Roboto', sans-serif;
    }
    #btnTopup{
        position:absolute;
        left:27%;
        top:124%;
        margin-bottom: 50px;
    }
    #pembatas{
        position: absolute;
        left: 650px;
        top:350px;
        width:1px;
        height: 450px;
        background-color: white;
    }
    #historyTitle{
        position: absolute;
        left:880px;
        top:320px;
        width: 100px;
        height: 50px;
        font-size:30px;
        font-weight:bold;
        color:white;
        font-family: 'Roboto', sans-serif;
    }
    #history{
        position: absolute;
        left:680px;
        top:420px;
        width: 500px;
        text-align: center;
        background-color: tomato;
    }
</style>

<div class="container" style="margin-top:150px;margin-left:130px;color:white;font-weight:100;">
    <div id="pageTitle"><h1 style="color: black">Profile</h1></div>
    <div id="boxHotel">
        <div id="profileTitle">Profile Info</div>
        <div id="pembatas"></div>
        @isset($user)
            @foreach ($user as $users)
                <div id="profileName">Name : {{$users->nama}}</div>
                <div id="profileEmail">Email : {{$users->email}}</div>
                <div id="profileMobilenumber">Mobile Number : {{$users->mobilenumber}}</div>
                <div id="profileSaldo">Balance : IDR.{{$users->saldo}}</div>
            @endforeach
        @endisset

        <form method = "POST" action="{{ url('/topup') }}">
            @csrf
            <div id="profiletopUp">Topup : <input type="number" name="nominal" placeholder="Nominal"></div>
            <div id="btnTopup"><input type="submit" value="Topup"></div>
        </form>

        <div id="historyTitle">History</div>
        <div class="history">
            <table border="1px" id="history">
                <tr>
                    <th>Booking Code</th>
                    <th>Room Type</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Subtotal</th>
                </tr>
                @foreach ($history as $key)
                    <tr>
                        <td><img src="{{$key->link}}" width="50" height="50"></td>
                        <td>{{$key->penginapan}}</td>
                        <td>{{$key->harga}}</td>
                        <td>{{$key->hari}}</td>
                        <td>{{$key->total}}</td>
                        <td><button style="width: 100px;
                            height: 30px;font-size:16px;"><a href="detailPage/{{$key->penginapan}}">Detail</a></button></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
