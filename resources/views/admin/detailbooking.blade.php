@extends('admin/layout')

@section('content')
<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <!-- box md 6-->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h1 class="box-title"><h1>Booking Detail</h1>
                        </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <form method="post" action="/insertservice">
                                @csrf
                                Booking Number
                                <select name="booking_number" id="booking_number" class="form-control tm-select" onchange="number()">
                                    <option value="">Pilih Booking Number</option>
                                    @foreach ($datas as $item)
                                        <option value="{{$item->booking_number}}">{{$item->booking_number}}</option>
                                    @endforeach
                                </select>
                                @error('booknumber')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror<br>
                                Service Name
                                <select name="service_name" id="service_name" class="form-control tm-select" onchange="service()">
                                    <option value="">Pilih Menu</option>
                                    @for ($i = 1; $i <= count($menu['list']); $i++)
                                        <option value="{{$i}}">{{$menu['list'][$i-1]}}</option>
                                    @endfor
                                </select>
                                @error('servicename')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror<br>
                                Service Price
                                <input type="hidden" name="booknumber" id="booknumber" value="" class="form-control" >
                                <input type="hidden" name="servicename" id="servicename" value="" class="form-control">
                                <input type="text" name="service_price" id="service_price" value="" class="form-control">
                                @error('service_price')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror<br>
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </form>
                        </div>

                    <!-- /.box-body -->
                        <div class="box-footer clearfix">
                        </div>
                    </div>
                    <!-- /.box md 6-->
                </div>
                {{-- /////////////////////////////////////////// --}}
                <div class="col-md-6">
                    <!-- box md 6-->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h1 class="box-title"><h1>List Menu</h1>
                        </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Harga</th>
                                    </tr>
                                    @for ($i = 0; $i < count($menu["list"]); $i++)
                                    <tr>
                                        <td>{{$menu["list"][$i]}}</td>
                                        <td>{{$menu["harga"][$i]}}</td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>

                    <!-- /.box-body -->
                        <div class="box-footer clearfix">
                        </div>
                    </div>
                    <!-- /.box md 6-->
                </div>
            </div>
        </section>
    </div>
</body>

@endsection

