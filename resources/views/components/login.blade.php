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
    </style>

    <link rel="stylesheet" href="{{ url("/templateweb/css/bootstrap.min.css") }}">

</head>
<body>

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
                <form method = "POST" action="{{ url('/prosesLogin') }}">
                    @csrf
                    Phone Number
                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                    <br>
                    Password
                    <input type="password" class="form-control" name="password" placeholder="Password">

                    <br>

                    <button class="btn btn-primary" style="background-color:#ee5057;">Login</button>
                </form>
                <br>
                <div id="registerText">Don't Have an ID? <a href="http://localhost:8000/register">Register</a></div>
            </div>
        </div>
    </div>

</body>
</html>

{{-- <div id="loginBox"></div> --}}
{{-- <div class="loginBoxTransparent">
    <div id="derawanAdventures">
        <div id="logo1">Hotel</div>
        <div id="logo2">Inn</div>
    </div>

    <form method = "POST" action="{{ url('/prosesLogin') }}">
        @csrf
        <div id="phoneInput"><input type="text" class="form-control" name="phone" placeholder="Phone"  ></div>
        <div id="passwordInput"><input type="password" class="form-control" name="password" placeholder="Password"  ></div>
        <div id="btnLogin"><input type="submit" value="Login"></div>
    </form>

</div> --}}
