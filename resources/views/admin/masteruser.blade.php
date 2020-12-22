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
            var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var d, day, hr, min, sec, date, month, year, ampm;
            var x = document.getElementById("time");
            function updateTime(){
                d = new Date();
                day = days[d.getDay()];
                hr = d.getHours();
                min = d.getMinutes();
                sec = d.getSeconds();
                if (sec < 10) {
                    sec = "0" + sec;
                }
                if (min < 10) {
                    min = "0" + min;
                }
                ampm = " AM";
                if( hr > 12 ) {
                    hr -= 12;
                    ampm = " PM";
                }
                date = d.getDate();
                month = months[d.getMonth()];
                year = d.getFullYear();
                x = document.getElementById("time");
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
                            <h3 class="box-title">Customers Table</h3>
                        </div>
                    <!-- /.box-header -->
                        <div class="box-body">

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Birthdate</th>
                                    <th>Join Date</th>
                                    <th>Books</th>

                                </tr>
                                @foreach ($listusers as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <?php
                                        $newDate = date("l, d M Y", strtotime($user->birthdate));
                                        echo "<td>".$newDate."</td>";
                                        $joinDate = date("l, d M Y", strtotime($user->created_at));
                                        echo "<td>".$joinDate."</td>";
                                    ?>
                                    <td>--ctr--</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                {{ $listusers->links() }}
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
