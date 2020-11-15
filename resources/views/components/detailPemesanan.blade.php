@extends('home')
@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto:wght@500&display=swap" rel="stylesheet">

<style>
    #boxHotel{
        width: 1050px;
        height: 500px;
        border: 2px solid #ccc;
        margin-bottom: 50px;
        -webkit-transition: 0.5s ease;
        background-color:darkslategray;
    }
    #photoHotel{
        position: absolute;
        top:320px;
        left:160px;
        width: 300px;
        height: 300px;
        border: 2px solid #ccc;
        background-size: cover;
        background-repeat: no-repeat;
    }
    #hotelName{
        position: absolute;
        left:500px;
        top:320px;
        width: 600px;
        height: 50px;
        font-size:30px;
        font-weight:bold;
        color:tomato;
        font-family: 'Roboto', sans-serif;
    }
    #hotelAddress{
        position: absolute;
        left:500px;
        top:430px;
        width: 730px;
        height: 50px;
        font-size:20px;
        font-weight:bold;
        font-family: 'Roboto', sans-serif;
    }
    #hotelPrice{
        position: absolute;
        left:500px;
        top:400px;
        width: 530px;
        height: 50px;
        font-size:20px;
        font-weight:bold;
        font-family: 'Roboto', sans-serif;
        margin-top: 100px;
        text-align: justify;
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
        left:570px;
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
    #startDate{
        position: absolute;
        left:170px;
        top:700px;
        font-size:20px;
        font-weight:bold;
        font-family: 'Roboto', sans-serif;
    }
    #endDate{
        position: absolute;
        left:500px;
        top:700px;
        font-size:20px;
        font-weight:bold;
        font-family: 'Roboto', sans-serif;
    }
    #btnBook{
        position:absolute;
        left:62%;
        top:111%;
        margin-bottom: 50px;
    }
</style>

<div class="container" style="margin-top:150px;margin-left:130px;color:white;font-weight:100;">
    <div id="pageTitle"><h1 style="color: black">Hotel Detail</h1></div>
    <div id="boxHotel">
        @isset($hotel)
            <div id="photoHotel"><img src="{{$hotel->link}}" width="300" height="300"></div>
            <div id="hotelName">{{$hotel->nama}}</div>
            <div id="hotelAddress">Address : <br>{{$hotel->alamat}}</div>
            <div id="hotelPrice"><br><br>Price : <br>Rp.{{$hotel->harga}}/Night </div>
        @endisset

        <form method = "POST" action="{{ url('/book') }}">
            @csrf
            <input type="hidden" name="penginapan" value="{{$hotel->nama}}">
            <div id="startDate">Start Date : <input type="date" name="start"></div>
            <div id="endDate">End Date : <input type="date" name="end"></div>
            <div id="btnBook">
                <input type="submit" value="Book">
            </div>
        </form>
    </div>
</div>
@endsection
