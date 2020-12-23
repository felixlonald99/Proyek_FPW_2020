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
                    <div class="alert alert-danger" style="font-size: 12px">^ {{$message}}</div>
                @enderror
                <div id="datebirth">
                    <div class="row">
                        <div class="col">
                            <input type="number" class="form-control" name="year" min="1900" max="2020" placeholder="Birth Year" required >
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="month" min="1" max="12" placeholder="Birth Month" required >
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="day" min="1" max="31" placeholder="Birth Day"  required>
                        </div>
                    </div>
                </div>
                <div id="emailInput">
                    <input type="text" class="form-control" name="email" placeholder="Email"  >
                </div>
                @error('email')
                    <div class="alert alert-danger" style="font-size: 12px">^ {{$message}}</div>
                @enderror
                @isset($errorEmail)
                    <div class="alert alert-danger" style="font-size: 12px">^ {{$errorEmail}}</div>
                @endisset

                <div id="phoneInput">
                    <input type="text" class="form-control" name="phone" placeholder="Phone (+628 . . . )"   >
                </div>
                @error('phone')
                    <div class="alert alert-danger" style="font-size: 12px">^ {{$message}}</div>
                @enderror
                @isset($errorNoHP)
                    <div class="alert alert-danger" style="font-size: 12px">^ {{$errorNoHP}}</div>
                @endisset

                <div id="passwordInput">
                    <input type="password" class="form-control" name="password" placeholder="Password"  >
                </div>
                @error('password')
                    <div class="alert alert-danger" style="font-size: 12px">^ {{$message}}</div>
                @enderror

                <div id="confirmPasswordInput">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"  >
                </div>

                <br>
                <button class="btn btn-primary" style="background-color:#ee5057;">Register</button>
            </form>
            <br>
            <div id="loginText">Already have an ID? <a href="http://localhost:8000/login">Login</a></div>
        </div>
    </div>
</div>

</body>
</html>
