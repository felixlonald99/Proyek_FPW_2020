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
                            <h3 class="box-title"><B>BOOKED ROOMS</B></h3>
                        </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-1">
                                <label>DATE FILTER</label>
                            </div>
                            <div class="col-md-2">
                                <form action="/filtertanggal" method="post">
                                    @csrf
                                    <input type="date" class="form-control" name="date" id="date">
                            </div>
                            <div class="col-md-2">
                                    <button type="submit" class="btn btn-block btn-info btn-sm">SEARCH</button>
                                </form>
                            </div>

                            <div class="col-md-2">
                                <form action="/bookedroompage" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-warning btn-sm">SHOW ALL</button>
                                </form>
                            </div>


                            <table class="table table-bordered">
                                <tbody>
                                <tr style="text-align: center;">
                                    <th style="width: 25px">Booking Number</th>
                                    <th>Guest Name</th>
                                    <th>Guest Email</th>
                                    <th>Check IN</th>
                                    <th>Check OUT</th>
                                    <th>Room Number</th>
                                </tr>
                                @foreach ($listbooking as $booking)
                                <tr>
                                    <td>{{ $booking->booking_number }}</td>
                                    <td>{{ $booking->guest_name }}</td>
                                    <td>{{ $booking->guest_email }}</td>
                                    <?php
                                        $newDateIN = date("d M Y", strtotime($booking->check_in));
                                        echo "<td>".$newDateIN."</td>";
                                        $newDateOUT = date("d M Y", strtotime($booking->check_out));
                                        echo "<td>".$newDateOUT."</td>";
                                    ?>
                                    <td>{{ $booking->room_number }}</td>
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
