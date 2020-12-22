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
                <div class="col-md-6">
                    <!-- box md 6-->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h1 class="box-title"><h1>Add Promo Code</h1>
                        </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <form method="post" action="/insertpromo">
                                @csrf
                                Promo Code
                                <input type="text" name="promocode" class="form-control"><br>
                                Nominal Discount
                                <input type="text" name="nominal" class="form-control"><br>
                                Minimum Transaction
                                <input type="text" name="minimum" class="form-control"><br>
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
                            <h1 class="box-title"><h1>List Promo Code</h1>
                        </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Promo Code</th>
                                        <th>Nominal Discount</th>
                                        <th>Minimal Transaction</th>
                                        <th>Action</th>
                                     </tr>

                                    @isset($promo)
                                        @foreach ($promo as $item)
                                            <tr>
                                                <td>{{$item->nama_promo}}</td>
                                                <td>{{$item->nominal_potongan}}</td>
                                                <td>{{$item->minimal_transaksi}}</td>
                                                <td>
                                                    <form method="post" action="{{url('/deletepromo')}}">
                                                        @csrf
                                                        <input type="hidden" name="idDelete" value= "{{$item->nama_promo}}">
                                                        <button class="btn btn-danger form-control">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
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
