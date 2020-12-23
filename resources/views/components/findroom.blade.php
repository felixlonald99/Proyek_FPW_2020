<title>HotelInn</title>
@extends('home')
@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="tm-top-bar-bg"></div>
<input type="hidden" id="ctr" value="{{$room}}">

<table class="table">
    @if($ctrkosong == 0)
        <form method="post" action="{{ url('/bookRoom') }}">
            @csrf
            @if($tipe[1] >= $room)
                <tr>
                    <td><img src="{{ url("/templateweb/img/tipe1.jpeg")}}" style="width:250px;height:170px;"></td>
                    <td><h1>Single Standard Room</h1><br>Sisa : {{$tipe[1]}} Kamar</td>
                    <td>Jumlah yang ingin dipesan<br><input type="number" value="0" id="num1" name="tipe1"></td>
                </tr>
            @endif
            @if($tipe[2] >= $room)
                <tr>
                    <td><img src="{{ url("/templateweb/img/tipe2.jpeg")}}" style="width:250px;height:170px;"></td>
                    <td><h1>Standard Twin Room</h1><br>Sisa : {{$tipe[2]}} Kamar</td>
                    <td>Jumlah yang ingin dipesan<br><input type="number" value="0" id="num2" name="tipe2"></td>
                </tr>
            @endif
            @if($tipe[3] >= $room)
                <tr>
                    <td><img src="{{ url("/templateweb/img/tipe3.jpeg")}}" style="width:250px;height:170px;"></td>
                    <td><h1>Deluxe Room</h1><br>Sisa : {{$tipe[3]}} Kamar</td>
                    <td>Jumlah yang ingin dipesan<br><input type="number" value="0" id="num3" name="tipe3"></td>
                </tr>
            @endif
            @if($tipe[4] >= $room)
                <tr>
                    <td><img src="{{ url("/templateweb/img/tipe4.jpeg")}}" style="width:250px;height:170px;"></td>
                    <td><h1>Luxury Room</h1><br>Sisa : {{$tipe[4]}} Kamar</td>
                    <td>Jumlah yang ingin dipesan<br><input type="number" value="0" id="num4" name="tipe4"></td>
                </tr>
            @endif
            @if($tipe[5] >= $room)
                <tr>
                    <td><img src="{{ url("/templateweb/img/tipe5.jpeg")}}" style="width:250px;height:170px;"></td>
                    <td><h1>Family Suite</h1><br>Sisa : {{$tipe[5]}} Kamar</td>
                    <td>Jumlah yang ingin dipesan<br><input type="number" value="0" id="num5" name="tipe5"></td>
                </tr>
            @endif

            <input type="hidden" name="nights" value="{{$night}}">
            <input type="hidden" name="checkin" value="{{$checkin}}">
            <input type="hidden" name="rooms" value="{{$room}}">

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary pull-right">BOOK ROOM</button>
                </div>
            </div>
        <br>
        </form>
    @elseif($ctrkosong == 1)
        <tr><td><h1><center>Kamar Tidak Tersedia</center></h1></td></tr>
    @endif

</table>

<script>
    document.getElementById("num1").addEventListener("click", function() {
        var result = document.getElementById("ctr").value;
        var hasilnum = document.getElementById("num1").value*1  + document.getElementById("num2").value*1  +
        document.getElementById("num3").value*1  + document.getElementById("num4").value*1  +
        document.getElementById("num5").value*1 ;

        if(hasilnum > result){
            // document.getElementById("num1").value = hasilnum;
            document.getElementById("num1").value -= 1;
            alert('sudah melebihi kapasitas ruangan');
        }

        var isinum = document.getElementById("num1").value*1;
        if(isinum < 0){
            document.getElementById("num1").value = 0;
            alert('tidak boleh kurang dari 0');
        }
    });
    document.getElementById("num2").addEventListener("click", function() {
        var result = document.getElementById("ctr").value;
        var hasilnum = document.getElementById("num1").value*1  + document.getElementById("num2").value*1  +
        document.getElementById("num3").value*1  + document.getElementById("num4").value*1  +
        document.getElementById("num5").value*1 ;

        if(hasilnum > result){
            // document.getElementById("num1").value = hasilnum;
            document.getElementById("num2").value -= 1;
            alert('sudah melebihi kapasitas ruangan');
        }
        var isinum = document.getElementById("num2").value*1;
        if(isinum < 0){
            document.getElementById("num2").value = 0;
            alert('tidak boleh kurang dari 0');
        }
    });
    document.getElementById("num3").addEventListener("click", function() {
        var result = document.getElementById("ctr").value;
        var hasilnum = document.getElementById("num1").value*1  + document.getElementById("num2").value*1  +
        document.getElementById("num3").value*1  + document.getElementById("num4").value*1  +
        document.getElementById("num5").value*1 ;

        if(hasilnum > result){
            // document.getElementById("num1").value = hasilnum;
            document.getElementById("num3").value -= 1;
            alert('sudah melebihi kapasitas ruangan');
        }
        var isinum = document.getElementById("num3").value*1;
        if(isinum < 0){
            document.getElementById("num3").value = 0;
            alert('tidak boleh kurang dari 0');
        }
    });
    document.getElementById("num4").addEventListener("click", function() {
        var result = document.getElementById("ctr").value;
        var hasilnum = document.getElementById("num1").value*1  + document.getElementById("num2").value*1  +
        document.getElementById("num3").value*1  + document.getElementById("num4").value*1  +
        document.getElementById("num5").value*1 ;

        if(hasilnum > result){
            // document.getElementById("num1").value = hasilnum;
            document.getElementById("num4").value -= 1;
            alert('sudah melebihi kapasitas ruangan');
        }
        var isinum = document.getElementById("num4").value*1;
        if(isinum < 0){
            document.getElementById("num4").value = 0;
            alert('tidak boleh kurang dari 0');
        }
    });
    document.getElementById("num5").addEventListener("click", function() {
        var result = document.getElementById("ctr").value;
        var hasilnum = document.getElementById("num1").value*1  + document.getElementById("num2").value*1  +
        document.getElementById("num3").value*1  + document.getElementById("num4").value*1  +
        document.getElementById("num5").value*1 ;

        if(hasilnum > result){
            // document.getElementById("num1").value = hasilnum;
            document.getElementById("num5").value -= 1;
            alert('sudah melebihi kapasitas ruangan');
        }
        var isinum = document.getElementById("num5").value*1;
        if(isinum < 0){
            document.getElementById("num5").value = 0;
            alert('tidak boleh kurang dari 0');
        }
    });
</script>
@endsection
