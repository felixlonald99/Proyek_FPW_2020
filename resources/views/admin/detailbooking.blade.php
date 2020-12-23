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
                                                        <button type="submit" class="btn btn-block btn-sm btn-info">CHANGE STATUS</button>
                                                    </form>
                                                </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Payment Method</th>
                                            <td><input type='text' value='{{$data->payment_method}}' class='form-control' id='paymentmethod' name='paymentmethod'></td>
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
                                        <tr>
                                            <th>Room Number</th>
                                            <td>
                                                <select class='form-control' id='roomnumber' name='roomnumber'>
                                                    @foreach ($room as $room)
                                                        <option value="{{$room}}">{{$room}}</option>
                                                    @endforeach
                                                </select>
                                                <td>
                                                    <button type="submit" class="btn btn-block btn-sm btn-info">ASSIGN ROOM</button>
                                                </td>
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
                                <form action="/managebooking" method="get">
                                    <button type="submit" class="btn btn-block btn-info">BACK</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form action="/reject" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$data->booking_number}}">
                                    <button type="submit" class="btn btn-block btn-danger">REJECT</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form action="/accept" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$data->booking_number}}">
                                    <button type="submit" class="btn btn-block btn-success">ACCEPT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</body>

@endsection
