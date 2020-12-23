@extends('admin/layout')

@section('content')
<script>
    function number(){
        var selected = document.getElementById("booking_number").selectedIndex;
        document.getElementById("booknumber").value = selected;
    }
    function service(){
        var selected = document.getElementById("service_name").selectedIndex;
        if(selected == 1){document.getElementById("service_price").value = 32000;document.getElementById("servicename").value = "Nasi Goreng";}
        else if(selected == 2){document.getElementById("service_price").value = 27000;document.getElementById("servicename").value ="Mie Goreng";}
        else if(selected == 3){document.getElementById("service_price").value = 25000;document.getElementById("servicename").value ="Nasi Pecel Ayam";}
        else if(selected == 4){document.getElementById("service_price").value = 23000;document.getElementById("servicename").value ="Nasi Empal";}
        else if(selected == 5){document.getElementById("service_price").value = 24000;document.getElementById("servicename").value ="Mie Pangsit";}
        else if(selected == 6){document.getElementById("service_price").value = 30000;document.getElementById("servicename").value ="Nasi Kuning";}
        else if(selected == 7){document.getElementById("service_price").value = 20000;document.getElementById("servicename").value ="Chicken Karrage";}
        else if(selected == 8){document.getElementById("service_price").value = 30000;document.getElementById("servicename").value ="Nasi Kari";}
        else if(selected == 9){document.getElementById("service_price").value = 20000;document.getElementById("servicename").value ="Batagor";}
        else if(selected == 10){document.getElementById("service_price").value = 28000;document.getElementById("servicename").value ="Coto Makassar";}
        else if(selected == 11){document.getElementById("service_price").value = 5000;document.getElementById("servicename").value ="Air Mineral";}
        else if(selected == 12){document.getElementById("service_price").value = 6500;document.getElementById("servicename").value ="Fanta";}
        else if(selected == 13){document.getElementById("service_price").value = 6500;document.getElementById("servicename").value ="Sprite";}
        else if(selected == 14){document.getElementById("service_price").value = 6500;document.getElementById("servicename").value ="Coca Cola";}
        else if(selected == 15){document.getElementById("service_price").value = 7500;document.getElementById("servicename").value ="Pulpy Orange";}
        else if(selected == 16){document.getElementById("service_price").value = 5000;document.getElementById("servicename").value ="Es Teh Manis";}
        else if(selected == 17){document.getElementById("service_price").value = 3000;document.getElementById("servicename").value ="Es Teh Tawar";}
        else if(selected == 18){document.getElementById("service_price").value = 5000;document.getElementById("servicename").value ="Teh Manis Hangat";}
        else if(selected == 19){document.getElementById("service_price").value = 3000;document.getElementById("servicename").value ="Teh Tawar Hangat";}
        else if(selected == 20){document.getElementById("service_price").value = 8000;document.getElementById("servicename").value ="Frestea";}
    }
</script>
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
                <div class="col-md-6">
                    <!-- box md 6-->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h1 class="box-title"><h1>Add Room Servive</h1>
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
                                        <?php
                                            $formatHarga = number_format($menu["harga"][$i],0,',','.');
                                        ?>
                                        <td>Rp. {{ $formatHarga }}</td>
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

