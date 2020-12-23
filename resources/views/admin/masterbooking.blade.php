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
                <div class="col-md-12">
                    <!-- box md 6-->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"><B>BOOKINGS</B></h3>
                        </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-1">
                                <label>PAYMENT FILTER</label>
                            </div>
                            <div class="col-md-2">
                                <form action="/filterpaymentpending" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-warning btn-sm">PENDING</button>
                                </form>
                            </div>
                            <div class="col-md-1">
                                <form action="/filterpaymentpaid" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-success btn-sm">PAID</button>
                                </form>
                            </div>
                            <div class="col-md-1">
                                <form action="/masterbookingpage" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-info btn-sm">ALL</button>
                                </form>
                            </div>
                            <div class="col-md-1">
                                <label>STATUS FILTER</label>
                            </div>
                            <div class="col-md-2">
                                <form action="/filterstatuspending" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-warning btn-sm">PENDING</button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form action="/filterstatuscheckedin" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-success btn-sm">CHECKED IN</button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form action="/filterstatuscheckedout" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-danger btn-sm">CHECKED OUT</button>
                                </form>
                            </div>

                            <table class="table table-bordered">
                                <tbody>
                                <tr style="text-align: center;">
                                    <th style="width: 25px">Book Number</th>
                                    <th>Guest Name</th>
                                    <th>Guest Email</th>
                                    <th>Room Type</th>
                                    <th>Room Number</th>
                                    <th>Check IN</th>
                                    <th>Check OUT</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($listbooking as $booking)
                                <tr>
                                    <td>{{ $booking->booking_number }}</td>
                                    <td>{{ $booking->guest_name }}</td>
                                    <td>{{ $booking->guest_email }}</td>
                                    <td>{{ $booking->roomtype_name }}</td>
                                    <td>{{ $booking->room_number }}</td>
                                    <?php
                                        $newDateIN = date("d M Y", strtotime($booking->check_in));
                                        echo "<td>".$newDateIN."</td>";
                                        $newDateOUT = date("d M Y", strtotime($booking->check_out));
                                        echo "<td>".$newDateOUT."</td>";
                                    ?>
                                    <?php
                                        if ($booking->booking_status==0) {
                                            $stat = "PENDING";
                                            echo "<td><span class='badge bg-yellow'>$stat</td>";
                                        } else if ($booking->booking_status==1) {
                                            $stat = "CHECKED IN";
                                            echo "<td><span class='badge bg-green'>$stat</td>";
                                        } else if ($booking->booking_status==2) {
                                            $stat = "CHECKED OUT";
                                            echo "<td><span class='badge bg-red'>$stat</td>";
                                        }
                                        if ($booking->payment_status==0) {
                                            $stat = "PENDING";
                                            echo "<td><span class='badge bg-yellow'>$stat</td>";
                                        } else if ($booking->payment_status==1) {
                                            $stat = "PAID";
                                            echo "<td><span class='badge bg-green'>$stat</td>";
                                        }
                                    ?>
                                    <td>
                                        <table>
                                        <tr>
                                            <td>
                                                <form action="/detailbooking" method="get">
                                                    @csrf
                                                    <input type="hidden" name="booking_number" value="{{$booking->booking_number}}">
                                                    <button type="submit" class="btn btn-block btn-sm btn-info">DETAIL</button>
                                                </form>
                                            </td>
                                            {{-- <td>
                                                <form action="/reject" method="post">
                                                    @csrf
                                                    <input type="hidden" name="booking_number" value="{{$booking->booking_number}}">
                                                    <button type="submit" class="btn btn-block btn-danger">REJECT</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="/accept" method="post">
                                                    @csrf
                                                    <input type="hidden" name="booking_number" value="{{$booking->booking_number}}">
                                                    <button type="submit" class="btn btn-block btn-success">ACCEPT</button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                {{ $listbooking->links() }}
                            </ul>
                        </div>
                    </div>
                    <!-- /.box md 6-->
                </div>
            </div>
        </section>
    </div>
</body>

@endsection
