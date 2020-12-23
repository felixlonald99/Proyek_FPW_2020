@extends('admin/layout')

@section('content')

<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- box md 6-->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"><b>BOOKING #{{ $data->booking_number }} DETAIL</b></h3>
                        </div>
                    <!-- /.box-header -->

                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $data->guest_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $data->guest_email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Room Type</th>
                                            <td>{{ $data->roomtype_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <?php
                                            $formatHarga = number_format($data->total_price,0,',','.');
                                            ?>
                                            <td>Rp. {{ $formatHarga }}</td>
                                        </tr>
                                        <tr>
                                            <th>Payment Status</th>
                                            <td>
                                            <?php
                                                if ($data->payment_status==0) {
                                                    $stat = "PENDING";
                                                    echo "<span class='badge bg-yellow'>$stat</span>";
                                                } else if ($data->payment_status==1) {
                                                    $stat = "PAID";
                                                    echo "<span class='badge bg-green'>$stat</span>";
                                                }
                                            ?>
                                                <td>
                                                    <form action="/changepaymentstatus" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="booking_number" value="{{$data->booking_number}}">
                                                        <input type="hidden" name="payment_status" value="{{$data->payment_status}}">
                                                        <button type="submit" class="btn btn-block btn-sm btn-info">UPDATE PAYMENT & STATUS</button>
                                                </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Payment Method</th>
                                            <td><input type='text' value='{{$data->payment_method}}' class='form-control' id='paymentmethod' name='paymentmethod'></td>
                                                    </form>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <?php
                                                $newDate = date("d M Y", strtotime($data->check_in));
                                            ?>
                                            <th style="width:30%">Check IN</th>
                                            <td>{{ $newDate }}</td>
                                        </tr>
                                        <tr>
                                            <?php
                                                $newDate = date("d M Y", strtotime($data->check_out));
                                            ?>
                                            <th>Check OUT</th>
                                            <td>{{ $newDate }}</td>
                                        </tr>
                                        <tr>
                                            <th>Booked At</th>
                                            <td>{{ $data->created_at }}</td>
                                        </tr>
                                        @if (session('status'))
                                            <div class="alert alert-danger">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <tr>
                                            <th>Room Number</th>
                                            <td>
                                                <form action="/assignroom" method="POST">
                                                        @csrf
                                                    <input type="hidden" name="booking_number" value="{{$data->booking_number}}">
                                                    <select class='form-control' id='roomnumber' name='roomnumber'>
                                                        @foreach ($room as $room)
                                                            <option value="{{$room}}">{{$room}}</option>
                                                        @endforeach
                                                    </select>
                                                    <td>
                                                        <button type="submit" class="btn btn-block btn-sm btn-info">ASSIGN ROOM</button>
                                                    </td>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Booking Status</th>
                                            <td><?php
                                            if ($data->booking_status==0) {
                                                $stat = "PENDING";
                                                echo "<span class='badge bg-yellow'>$stat</span>";
                                            } else if ($data->booking_status==1) {
                                                $stat = "CHECKED IN";
                                                echo "<span class='badge bg-green'>$stat</span>";
                                            } else if ($data->booking_status==2) {
                                                $stat = "CHECKED OUT";
                                                echo "<td><span class='badge bg-red'>$stat</td>";
                                                }
                                            ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <form action="/setbookingpending" method="post">
                                    <input type="hidden" name="booking_number" value="{{$data->booking_number}}">
                                    <button type="submit" class="btn btn-block btn-warning">SET PENDING</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form action="/setbookingcheckedin" method="post">
                                    @csrf
                                    <input type="hidden" name="booking_number" value="{{$data->booking_number}}">
                                    <button type="submit" class="btn btn-block btn-success">CHECK IN</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form action="/setbookingcheckedout" method="post">
                                    @csrf
                                    <input type="hidden" name="booking_number" value="{{$data->booking_number}}">
                                    <button type="submit" class="btn btn-block btn-danger">CHECK OUT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function thousands_separators(num)
                    {
                    var num_parts = num.toString().split(".");
                    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    return num_parts.join(".");
                    }
                </script>

            </div>
        </section>
    </div>
</body>


@endsection
