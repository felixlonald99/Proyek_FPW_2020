<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .header{
            height: 150px;
            background-color:darkslategray;
            color:white;
            font-family: 'Quicksand', sans-serif;
        }
        #Logo{
            position: absolute;
            width: 100px;
            height: 100px;
            background-image: url("images/logo.jpg");
            background-size: contain;
            border-radius:45px;
            left:25px;
            top:25px;
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
        #kataAdmin{
            position: absolute;
            left: 627px;
            top:50px;
            font-size: 30px;
            font-family: 'Quicksand', sans-serif;
            font-weight: bold;
            color: white;
        }
        #buttonLogout{
            position: absolute;
            left: 1150px;
            top:50px;
        }
        #buttonLogout :hover{
                cursor: pointer;
                color: rgb(188, 239, 156);
        }
        #pembatas{
            position: absolute;
            left: 1027px;
            top:50px;
            width:1px;
            height: 50px;
            background-color: white;
        }
        input[type=text], select {
            width: 100%;
            padding: 10px 10px;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size:18px;
            opacity: 1;
        }
        input[type=number], select {
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
        button{
            width: 100%;
            height: 40px;
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
        #nama{
            position:absolute;
            left:30%;
            top:20%;
        }
        #alamat{
            position:absolute;
            left:30%;
            top:30%;
        }
        #harga{
            position:absolute;
            left:30%;
            top:40%;
        }
        #link{
            position:absolute;
            left:30%;
            top:50%;
        }
        #btnTambah{
            position:absolute;
            left:41%;
            top:105%;
            margin-bottom: 50px;
        }
        #btnPreview{
            position:absolute;
            left:30%;
            top:70.5%;
            width:20%;
        }
        #loginText{
            position:absolute;
            left:33%;
            top:92%;
            font-size:20px;
        }
        .registerBoxTransparent{
            height:90%;
            width:50%;
            position:absolute;
            left:25%;
            font-family: 'Roboto', sans-serif;
            top:15%;
        }
        #photoDisplay{
            position:absolute;
            width:200px;
            height:200px;
            left:34%;
            top:60%;
            border:ridge;
            background-size:cover;
        }
    </style>

    <script>
        function preview()
        {
            var link = document.getElementById("linkk").value;
            document.getElementById("foto").src = link;
        }
    </script>
    <link rel="stylesheet" href="{{ url("/assets/js/bootstrap.min.js") }}">
    <link rel="stylesheet" href="{{ url("/assets/css/bootstrap.min.css") }}">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
</head>
<body style="margin: 0px;">

    <div class="header">
        <div id="Logo"></div>
        <div id="kataAdmin">Admin</div>
        <div id="buttonLogout"><a href="http://localhost:8000/login"><button>Logout</button></a></div>
        <div id="pembatas"></div>
    </div>

    <br><br>
    <div id="container">
        <div id="row">
            <div class="col-md-12">
                <div class="card" style="margin:50px;">
                    <div class="card-header">
                        <center><h1>Halaman Admin</h1></center>
                    </div>
                    <div class="card-body">
                        <form method = "POST" action="{{ url('/tambahPenginapan') }}">
                            @csrf

                            Nama Tipe Kamar:
                            <input type="text" class="form-control" name="nama" placeholder="Nama Penginapan">
                            @error('nama')
                                <div style="color:red; font-weight:bold;position:absolute;left:70%;top:21%;font-size:14px" > <<< {{$message}}</div>
                            @enderror

                            <br>

                            Alamat Penginapan
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat Penginapan">
                            @error('alamat')
                                <div style="color:red; font-weight:bold;position:absolute;left:70%;top:31%;font-size:14px" > <<< {{$message}}</div>
                            @enderror


                            <br>

                            Harga Penginapan
                            <input type="number" class="form-control" name="harga" placeholder="Harga Penginapan">

                            <br>


                            Link Foto
                            <input type="text" class="form-control" id="linkk" name="link" placeholder="Link Foto">
                            @error('link')
                                <div style="color:red; font-weight:bold;position:absolute;left:90%;top:51%;font-size:14px" > <<< {{$message}}</div>
                            @enderror

                            <img src="" id="foto" width="200" height="200">

                            <br><br>
                            <input type="submit" value="Tambah"><br>
                        </form>

                    </div>
                    <button onclick="preview()" id="btnPreview">Preview</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
