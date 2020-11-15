<title>HotelInn</title>
@extends('home')
@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<style>
    .boxHotel{
        width: 500px;
        height: 230px;
        border: 2px solid #ccc;
        margin-bottom: 50px;
        -webkit-transition: 0.5s ease;
        background-color: darkslategray;
    }
    .boxHotel:hover{
        cursor: pointer;
    }
    .photoHotel{
        position: absolute;
        top:10px;
        left:30px;
        width: 200px;
        height: 200px;
        border: 2px solid #ccc;
    }
    .hotelName{
        position: absolute;
        left:250px;
        top:10px;
        width: 230px;
        height: 50px;
        font-size:20px;
        font-weight:bold;
        color:tomato;
        font-family: 'Roboto', sans-serif;
    }
    button{
        width: 100px;
        height: 30px;
        background-color: darkslategray;
        border: none;
        color: white;
        font-size: 30px;
        font-family: 'Quicksand', sans-serif;
        font-weight: bold;
        transition: 0.5s;
    }
</style>
    <div class="container" style="margin-top:150px;margin-left:130px;">
        <div class="row">
            @isset($penginapan)
                @foreach ($penginapan as $hotel)
                <a href="detailPage/{{$hotel->nama}}">
                    <div class="col-6">
                        <div class="boxHotel">
                            <div class="photoHotel"><img src="{{$hotel->link}}" width="200" height="200"></div>
                            <div class="hotelName">{{$hotel->nama}}</div>
                        </div>
                    </div>
                </a>
                @endforeach
            @endisset
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection
