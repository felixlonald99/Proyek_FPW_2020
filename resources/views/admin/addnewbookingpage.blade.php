@extends('admin/layout')

@section('content')
<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><b><p id="time"></p></b></h1>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <section class="content">
        <div class="row">
            <div class="col">
                <!-- box md 6-->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h1 class="box-title"><h1 style="margin-left:50px;">Add New Booking Room</h1>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body" style="margin-left:50px">
                        <form method="post" action="{{ url('/bookRoom') }}">
                            @csrf
                            Email
                            <input type="text" name="email" id="email" value="" style="width: 500px;" class="form-control" required>
                            @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror<br>
                            Nama
                            <input type="text" name="nama" style="width: 500px;" class="form-control" required>
                            @error('nama')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror<br>
                            Room tipe 1 :
                            <input type="number" name="tipe1" style="width: 500px;" class="form-control" min="0" required>
                            Room tipe 2 :
                            <input type="number" name="tipe2" style="width: 500px;" class="form-control" min="0" required>
                            Room tipe 3 :
                            <input type="number" name="tipe3" style="width: 500px;" class="form-control" min="0" required>
                            Room tipe 4 :
                            <input type="number" name="tipe4" style="width: 500px;" class="form-control" min="0" required>
                            Room tipe 5 :
                            <input type="number" name="tipe5" style="width: 500px;" class="form-control" min="0" required>
                            Night :
                            <input type="number" name="night" style="width: 500px;" class="form-control" min="1" max="10" required>
                            <br>
                            <button type="submit" class="btn btn-primary form-control" style="width: 100px;">Submit</button>
                        </form>
                    </div>

                <!-- /.box-body -->
                    <div class="box-footer clearfix">
                    </div>
                </div>
                <!-- /.box md 6-->
            </div>
    </section>
</div>
</body>

@endsection
