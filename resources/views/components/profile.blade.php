<title>HotelInn</title>
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
        font-size:16px;
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
        left:200px;
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
        top:400px;
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
        top:450px;
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
        top:500px;
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
    #pembatas{
        position: absolute;
        left: 680px;
        top:300px;
        width:1px;
        height: 300px;
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
    #changePasswordTitle{
        position: absolute;
        top:320px;
        left:820px;
        font-size:30px;
        font-weight:bold;
        color:white;
        font-family: 'Roboto', sans-serif;
    }
    input[type=password], select {
        width: 30%;
        padding: 10px 10px;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size:14px;
    }
    #btnSave{
        position:absolute;
        left:65%;
        top:90%;
        margin-bottom: 50px;
    }
</style>

<div class="container" style="margin-top:150px;margin-left:130px;color:white;font-weight:100;">
    <div id="pageTitle"><h1 style="color:white">Profile</h1></div>
    <div id="boxHotel">
        <div id="profileTitle">Profile Info</div>
        <div id="pembatas"></div>
        @isset($guestLogin)
            @foreach ($guestLogin as $guest)
                <div id="profileName">Name : {{$guest->name}}</div>
                <div id="profileEmail">Email : {{$guest->email}}</div>
                <div id="profileMobilenumber">Phone : {{$guest->phone}}</div>
            @endforeach
        @endisset

        <div id="changePasswordTitle">Change Password</div>
        <form method = "POST" action="{{ url('/changePassword') }}">
            @csrf
            <input type="password" name="old" placeholder="Old Password" style="position:absolute;top:400px;left:730px;" ></div>
            @error('old')
                <div style="color:red; font-weight:bold; position: absolute;top:410px;left:740px;width:380px;text-align:right;" >  {{$message}}</div>
            @enderror
            <input type="password" name="password" placeholder="New Password" style="position:absolute;top:450px;left:730px;"></div>
            @error('password')
            <div style="color:red; font-weight:bold; position: absolute;top:460px;left:740px;width:380px;text-align:right;" >  {{$message}}</div>
            @enderror
            <input type="password" name="password_confirmation" placeholder="Confirm New Password"  style="position:absolute;top:500px;left:730px;"></div>
            <div id="btnSave"><input type="submit" value="Save"></div>
        </form>
    </div>
</div>
@endsection
