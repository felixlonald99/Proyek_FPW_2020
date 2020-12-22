<!DOCTYPE html>
<html lang="en">
<head>
    <title>HotelInn</title>
    <style>
        html,body{
            background: url("images/loginBG.jpg");
            background-size: cover;
            position:center;
            height:100%;
        }
        .center {
            margin: auto;
            width: 50%;
            padding: 10px;
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
    <link rel="stylesheet" href="{{ url("/templateweb/css/bootstrap.min.css") }}">
</head>
<body style="margin:0px;">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto:wght@500&display=swap" rel="stylesheet">

<div class="container" style="padding-top:10%">
    <div class="card center" style="width:50%">
        <div class="row">
            <div class="col-md-1 center">
                <img src="{{ url("/templateweb/img/logo.png")}}">
            </div>
            <div class="col-md-8">
                <h3 class="display-1">Hotel</h1>
            </div>
        </div>
        <div class="card-body">
            <form method = "POST" action="{{ url('/prosesRegister') }}">
                @csrf

                <div id="fullnameInput">
                    <input type="text" class="form-control" name="fullname" placeholder="Full Name"  >
                </div>
                @error('fullname')
                    <div style="color:red; font-weight:bold;position: absolute;left:80%;top:20.5%;font-size:14px"> <<< {{$message}}</div>
                @enderror

                <div id="emailInput">
                    <input type="text" class="form-control" name="email" placeholder="Email"  >
                </div>
                @error('email')
                    <div style="color:red; font-weight:bold;position:absolute;left:77%;top:41%;font-size:14px;width:200px;" > <<< {{$message}}</div>
                @enderror

                <div id="phoneInput">
                    <input type="text" class="form-control" name="phone" placeholder="Phone (+628 . . . )"   >
                </div>
                @error('phone')
                    <div style="color:red; font-weight:bold;position:absolute;left:77%;top:32%;font-size:14px;width:200px;" > <<< {{$message}}</div>
                @enderror

                <div id="passwordInput">
                    <input type="password" class="form-control" name="password" placeholder="Password"  >
                </div>
                @error('password')
                    <div style="color:red; font-weight:bold;position:absolute;left:75%;top:51%;font-size:14px" > <<< {{$message}}</div>
                @enderror

                <div id="confirmPasswordInput">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"  >
                </div>

                <br>
                <button class="btn btn-primary" style="background-color:#ee5057;">Register</button>

                @isset($errorEmail)
                <div style="color:red; font-weight:bold;position:absolute;left:80%;top:41%;font-size:14px" > <<< {{$errorEmail}}</div>
                @endisset

                @isset($errorNoHP)
                <div style="color:red; font-weight:bold;position:absolute;left:80%;top:32%;font-size:14px" > <<< {{$errorNoHP}}</div>
                @endisset
            </form>
            <br>
            <div id="loginText">Already have an ID? <a href="http://localhost:8000/login">Login</a></div>
        </div>
    </div>
</div>

</body>
</html>
