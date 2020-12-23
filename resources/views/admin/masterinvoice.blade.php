@extends('admin/layout')

@section('content')

@if (Session::has('status'))
        <script>alert(`{{ Session::get('status') }}`)</script>
@endif

<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <section class="content">
            <div class="row">

                <div class="col-md-10">
                    <!-- box md 6-->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h1>INVOICE TABLE</h1>
                        </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Invoice Number</th>
                                        <th>Guest Email</th>
                                        <th>Total Price</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                     </tr>

                                    @isset($invoice)
                                        @foreach ($invoice as $item)
                                            <tr>
                                                <td>{{$item->invoice_number}}</td>
                                                <td>{{$item->guest_email}}</td>
                                                <?php
                                                    $formatHarga = number_format($item->total_price,0,',','.');
                                                ?>
                                                <td>Rp. {{ $formatHarga }}</td>
                                                <td>{{$item->payment_method}}</td>
                                                <td>{{$item->payment_status}}</td>
                                                <td>
                                                    <form method="post" action="/detailinvoice">
                                                        @csrf
                                                        <input type="hidden" name="invoicenumber" value= "{{$item->invoice_number}}">
                                                        <button class="btn btn-info form-control">Detail</button>
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
