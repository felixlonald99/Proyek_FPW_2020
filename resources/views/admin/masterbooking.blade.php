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
        <script>
            function updateTime(){
                var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                var d = new Date();
                var day = days[d.getDay()];
                var hr = d.getHours();
                var min = d.getMinutes();
                var sec = d.getSeconds();
                if (sec < 10) {
                    sec = "0" + sec;
                }
                if (min < 10) {
                    min = "0" + min;
                }
                var ampm = " AM";
                if( hr > 12 ) {
                    hr -= 12;
                    ampm = " PM";
                }
                var date = d.getDate();
                var month = months[d.getMonth()];
                var year = d.getFullYear();
                var x = document.getElementById("time");
                $(function(){
                    setInterval(updateTime, 1000);
                });
                x.innerHTML = day + ", " + date + " " + month + " " + year + " - " + hr + ":" + min + ":" + sec + ampm + " ";
            }
            $(function(){
                setInterval(updateTime, 1000);
            });

        </script>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- box md 6-->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Booking Table</h3>
                        </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-1">
                                <label>FILTER</label>
                            </div>
                            <div class="col-md-2">
                                <form action="/filteraccept" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-success btn-sm">ACCEPTED</button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form action="/filterpending" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-warning btn-sm">PENDING</button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form action="/filterreject" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-danger btn-sm">REJECTED</button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form action="/filterstandart" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-primary btn-sm">STANDART</button>
                                </form>
                            </div>

                            <div class="col-md-3">
                                <hr>
                            </div>

                            <hr>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                    <th style="width: 15px">ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Service</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                {{-- @foreach ($listbooking as $booking)
                                <tr>
                                    <td>{{ $booking->id_book }}</td>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ $booking->email }}</td>
                                    <td>{{ $booking->phone }}</td>
                                    <td>{{ $booking->service }}</td>
                                    <?php
                                        $newDate = date("l, d M Y", strtotime($booking->date));
                                        echo "<td>".$newDate."</td>";
                                    ?>
                                    <?php
                                        $newTime = date("H:i", strtotime($booking->time));
                                        echo "<td>".$newTime."</td>";
                                    ?>
                                    <?php
                                        if ($booking->status==0) {
                                            $stat = "PENDING";
                                            echo "<td><span class='badge bg-yellow'>$stat</td>";
                                        } else if ($booking->status==1) {
                                            $stat = "ACCEPTED";
                                            echo "<td><span class='badge bg-green'>$stat</td>";
                                        } else if ($booking->status==2) {
                                            $stat = "REJECTED";
                                            echo "<td><span class='badge bg-red'>$stat</td>";
                                        }
                                    ?>
                                    <td>
                                        <table>
                                        <tr>
                                            <td>
                                                <form action="/detail" method="get">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$booking->id_book}}">
                                                    <button type="submit" class="btn btn-block btn-info">DETAIL</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="/reject" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$booking->id_book}}">
                                                    <button type="submit" class="btn btn-block btn-danger">REJECT</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="/accept" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$booking->id_book}}">
                                                    <button type="submit" class="btn btn-block btn-success">ACCEPT</button>
                                                </form>
                                            </td>
                                        </tr> --}}
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
                                {{-- {{ $listbooking->links() }} --}}
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
