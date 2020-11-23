<!DOCTYPE html>
<html lang="en">
<head>
    <title>HotelInn</title>
    <style>
        .container{
            position:absolute;
            width: 100%;
            height: 100%;
            background-image: url("images/loginBG.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        #loginBox{
            height:70%;
            width:50%;
            position:absolute;
            left:25%;
            top:15%;
            background-color: white;
            opacity: 0.8;
        }
        .loginBoxTransparent{
            height:70%;
            width:50%;
            position:absolute;
            left:25%;
            top:15%;
            font-family: 'Roboto', sans-serif;
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
        #phoneInput{
            position:absolute;
            left:33%;
            top:30%;
        }
        #passwordInput{
            position:absolute;
            left:33%;
            top:45%;
        }
        #btnLogin{
            position:absolute;
            left:45.5%;
            top:65%;
            transition: width 0.5s , 0.5s;
        }
        input[type=text], select {
            width: 100%;
            padding: 10px 10px;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size:18px;
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
            background-color:green;
        }
        #registerText{
            position:absolute;
            left:35%;
            top:85%;
            font-size:20px;
        }
    </style>
</head>
<body style="margin:0px;">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto:wght@500&display=swap" rel="stylesheet">


<div class="container"></div>
<div id="loginBox"></div>
<div class="loginBoxTransparent">
    <div id="derawanAdventures">
        <div id="logo1">Hotel</div>
        <div id="logo2">Inn</div>
    </div>

    <form method = "POST" action="{{ url('/prosesLogin') }}">
        @csrf
        <div id="phoneInput"><input type="text" name="phone" placeholder="Phone"  ></div>
        <div id="passwordInput"><input type="password" name="password" placeholder="Password"  ></div>
        <div id="btnLogin"><input type="submit" value="Login"></div>
    </form>
    <div id="registerText">Don't Have an ID? <a href="http://localhost:8000/register">Register</a></div>
</div>

</body>
</html>
