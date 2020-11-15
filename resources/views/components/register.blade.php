<!DOCTYPE html>
<html lang="en">
<head>
    <title>HotelInn</title>
    <style>
        .container{
            position:absolute;
            width: 100%;
            height: 100%;
            background-image: url("images/registerBG.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        #registerBox{
            height:90%;
            width:60%;
            position:absolute;
            left:21%;
            top:5%;
            font-family: 'Roboto', sans-serif;
            background-color: white;
            opacity: 0.8;
        }
        .registerBoxTransparent{
            height:90%;
            width:50%;
            position:absolute;
            left:25%;
            font-family: 'Roboto', sans-serif;
            top:5%;
        }
        #derawanAdventures{
            position:absolute;
            width: 100%;
            top:5%;
            font-size:40px;
            font-weight:bold;
            cursor: pointer;
            -webkit-transition: 0.5s ease;
        }
        #logo1{
            position: absolute;
            left:41%;
            color:tomato;
        }
        #logo2{
            position: absolute;
            left:55%;
            color:green;
        }
        #derawanAdventures:hover{
            text-shadow: 0px -2px 0px #000000, 0 0 0px rgba(255, 255, 255, 0.8), 0 -4px 15px rgba(255, 255, 255, 0.5);
        }
        input[type=text], select {
            width: 100%;
            padding: 10px 10px;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size:18px;
            opacity: 1;
        }
        input[type=password], select {
            width: 100%;
            padding: 10px 10px;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size:18px;
        }
        input[type=submit] {
            width: 100%;
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
            background-color: green;
        }
        #fullnameInput{
            position:absolute;
            left:33%;
            top:20%;
        }
        #mobileNumberInput{
            position:absolute;
            left:33%;
            top:30%;
        }
        #emailInput{
            position:absolute;
            left:33%;
            top:40%;
        }
        #passwordInput{
            position:absolute;
            left:33%;
            top:50%;
        }
        #confirmPasswordInput{
            position:absolute;
            left:33%;
            top:60%;
        }
        #btnRegister{
            position:absolute;
            left:44%;
            top:75%;
        }
        #loginText{
            position:absolute;
            left:36%;
            top:90%;
            font-size:20px;
        }
        .errors{
            position:absolute;
            top:5%;
            left:8%;
        }
    </style>

    <script>
        function loginPage(){
            window.location.href = "http://localhost:8000/login";
        }
    </script>

</head>
<body style="margin:0px;">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto:wght@500&display=swap" rel="stylesheet">

<div class="container"></div>
<div id="registerBox"></div>
<div class="registerBoxTransparent">
    <div id="derawanAdventures">
        <div id="logo1">Hotel</div>
        <div id="logo2">Inn</div>
    </div>

    <form method = "POST" action="{{ url('/prosesRegister') }}">
        @csrf

        <div id="fullnameInput">
            <input type="text" name="fullname" placeholder="Full Name"  >
        </div>
        @error('fullname')
            <div style="color:red; font-weight:bold;position: absolute;left:80%;top:20.5%;font-size:14px"> <<< {{$message}}</div>
        @enderror

        <div id="emailInput">
            <input type="text" name="email" placeholder="Email"  >
        </div>
        @error('email')
            <div style="color:red; font-weight:bold;position:absolute;left:80%;top:41%;font-size:14px" > <<< {{$message}}</div>
        @enderror

        <div id="mobileNumberInput">
            <input type="text" name="mobilenumber" placeholder="Mobile Number"   >
        </div>
        @error('mobilenumber')
            <div style="color:red; font-weight:bold;position:absolute;left:80%;top:32%;font-size:14px" > <<< {{$message}}</div>
        @enderror

        <div id="passwordInput">
            <input type="password" name="password" placeholder="Password"  >
        </div>
        @error('password')
            <div style="color:red; font-weight:bold;position:absolute;left:75%;top:51%;font-size:14px" > <<< {{$message}}</div>
        @enderror

        <div id="confirmPasswordInput">
            <input type="password" name="password_confirmation" placeholder="Confirm Password"  >
        </div>

        <div id="btnRegister">
            <input type="submit" value="Register">
        </div>

        @isset($errorEmail)
        <div style="color:red; font-weight:bold;position:absolute;left:80%;top:41%;font-size:14px" > <<< {{$errorEmail}}</div>
        @endisset

        @isset($errorNoHP)
        <div style="color:red; font-weight:bold;position:absolute;left:80%;top:32%;font-size:14px" > <<< {{$errorNoHP}}</div>
        @endisset
    </form>


    <div id="loginText">Already have an ID? <a href="http://localhost:8000/login">Login</a></div>
</div>

</body>
</html>
