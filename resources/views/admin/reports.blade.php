@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{\Carbon\Carbon::now()->format('d-m-Y')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="rep">
                                    <div id="t_total"></div>


                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="rep">
                                    <div id="visitors"></div>


                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="rep">
                                    <div id="t_total11"></div>


                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="rep">
                                    <div id="visitors11"></div>


                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- Small boxes (Stat box) -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!----------------Team Leader-------------------------->
    <script type="text/javascript">
        google.charts.load("current", {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Status", "Numbers", {role: "style"}],
                    @foreach($sales as $sale)
                ["{{$sale->user->name}}", {{$sale->sales}}, "#02abff"],
                @endforeach
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2]);

            var options = {
                title: "Today Total Sales",
                width: 646,
                height: 300,
                bar: {groupWidth: "65%"},
                legend: {position: "none"},
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('t_total'));
            chart.draw(view, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Status", "Numbers", {role: "style"}],
                    @foreach($sales as $sale)
                ["{{$sale->user->name}}", {{$sale->visitor}}, "#02abff"],
                @endforeach
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2]);

            var options = {
                title: "Today Total Visitors",
                width: 646,
                height: 300,
                bar: {groupWidth: "65%"},
                legend: {position: "none"},
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('visitors'));
            chart.draw(view, options);
        }
    </script>

    <!----------------Team Leader-------------------------->
    <script type="text/javascript">
        google.charts.load("current", {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Status", "Numbers", {role: "style"}],
                    @foreach($salesyesterday as $sale)
                ["{{$sale->user->name}}", {{$sale->sales}}, "#02abff"],
                @endforeach
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2]);

            var options = {
                title: "Yesterday Total Sales",
                width: 646,
                height: 300,
                bar: {groupWidth: "65%"},
                legend: {position: "none"},
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('t_total11'));
            chart.draw(view, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Status", "Numbers", {role: "style"}],
                    @foreach($salesyesterday as $sale)
                ["{{$sale->user->name}}", {{$sale->visitor}}, "#02abff"],
                @endforeach
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2]);

            var options = {
                title: "Yesterday Total Visitors",
                width: 646,
                height: 300,
                bar: {groupWidth: "65%"},
                legend: {position: "none"},
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('visitors11'));
            chart.draw(view, options);
        }
    </script>

    <!-- /.content-wrapper -->
@endsection
