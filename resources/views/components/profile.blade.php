<title>HotelInn</title>
@extends('home')
@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto:wght@500&display=swap" rel="stylesheet">

<style>
    #boxHotel{
        width: 1050px;
        height: 700px;
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
    #pembatas{
        position: absolute;
        left: 650px;
        top:350px;
        width:1px;
        height: 600px;
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
        top:580px;
        left:275px;
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
        font-size:16px;
    }
    #btnSave{
        position:absolute;
        left:25%;
        top:140%;
        margin-bottom: 50px;
    }
</style>

<div class="container" style="margin-top:150px;margin-left:130px;color:white;font-weight:100;">
    <div id="pageTitle"><h1 style="color: black">Profile</h1></div>
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
            <input type="password" name="old" placeholder="Old Password" style="position:absolute;top:660px;left:200px;" ></div>
            @error('old')
                <div style="color:red; font-weight:bold; position: absolute;top:670px;left:205px;width:380px;text-align:right;" >  {{$message}}</div>
            @enderror
            <input type="password" name="new" placeholder="New Password" style="position:absolute;top:720px;left:200px;"></div>
            @error('new')
            <div style="color:red; font-weight:bold; position: absolute;top:730px;left:205px;width:380px;text-align:right;" >  {{$message}}</div>
            @enderror
            <input type="password" name="confirm" placeholder="Confirm New Password"  style="position:absolute;top:780px;left:200px;"></div>
            <div id="btnSave"><input type="submit" value="Save"></div>
        </form>

    </div>
</div>
@endsection
