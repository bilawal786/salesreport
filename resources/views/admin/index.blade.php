@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <form action="{{route('report.search')}}" method="Post">
                    @csrf
                    <div class="row mb-2">
                        @if(Auth::user()->role == 0)
                            <div class="col-sm-4">
                                <h1 class="m-0"><input type="date" name="date" class="form-control"></h1>
                            </div>
                            <div class="col-sm-2">
                                <h1 class="m-0">
                                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                </h1>
                            </div><!-- /.col -->
                        @else
                            <div class="col-sm-6">

                            </div>
                        @endif
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </form>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if(Auth::user()->role == 1)
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6 offset-md-3">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Create Sale</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('sale.store') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Reporting date</label>
                                                    <input type="date" class="form-control" name="date"
                                                           required="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Sales</label>
                                                    <input type="text" class="form-control" name="sales"
                                                           required="">
                                                </div>
                                            </div>
                                            @if(Auth::user()->email == 'ruby@caravane.earth')
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">SE</label>
                                                        <input type="text" class="form-control"
                                                               required="" name="se">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">MA</label>
                                                        <input type="text" class="form-control"
                                                               required="" name="ma">
                                                    </div>
                                                </div>

                                            @elseif(Auth::user()->email == 'shefa.k@caravane.earth')
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">BK</label>
                                                        <input type="number" class="form-control"
                                                               required="" name="bk">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">LU</label>
                                                        <input type="number" class="form-control"
                                                               required="" name="lu">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">AT</label>
                                                        <input type="number" class="form-control"
                                                               required="" name="at">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">DI</label>
                                                        <input type="number" class="form-control"
                                                               required="" name="di">
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Visitors</label>
                                                        <input type="number" class="form-control"
                                                               required="" name="visitor">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Report Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->


                        </div>
                        <!--/.col (right) -->
                    </div>
                @else
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-success btn-sm float-right" onclick="window.print()">Print this page</button>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            @foreach($sales as $sale)
                                                <th>{{$sale->user->name}}</th>
                                            @endforeach
                                            <th>Total Sales</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            @foreach($sales as $sale)
                                                <td>{{$sale->visitor}}</td>
                                            @endforeach
                                            <td>QTR {{$sales->sum('visitor')}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            @foreach($sales as $sale)
                                                <th>{{$sale->user->name}}</th>
                                            @endforeach
                                            <th>Total Visitors</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            @foreach($sales as $sale)
                                                <td>{{$sale->sales}}</td>
                                            @endforeach
                                            <td>QTR {{$sales->sum('sales')}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
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
                        <div class="col-md-6">
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="rep">
                                        <div id="visibility"></div>


                                    </div>

                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
            @endif
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
            };
            var chart = new google.visualization.PieChart(document.getElementById('t_total'));
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
            };
            var chart = new google.visualization.PieChart(document.getElementById('visitors'));
            chart.draw(view, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Status", "Numbers", {role: "style"}],
                ["Availability", 460, "#02abff"],
                ["Visitors", {{$sales->sum('sales')}}, "#02abff"],
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
                title: "Visibility",
                width: 646,
                height: 300,
                bar: {groupWidth: "65%"},
            };
            var chart = new google.visualization.PieChart(document.getElementById('visibility'));
            chart.draw(view, options);
        }
    </script>

    <!-- /.content-wrapper -->
@endsection
