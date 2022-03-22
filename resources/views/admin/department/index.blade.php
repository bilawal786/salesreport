@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- <h1>DataTables</h1> -->
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Departments</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                                 <a href="{{route('department.create')}}" class="btn btn-sm btn-success" style="float: right;"><i class="fa fa-plus"></i>  Add New</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>
                                                <a id="delete" href="{{route('department.delete', ['id' => $user->id])}}"
                                                   class="btn btn-sm btn-danger"
                                                >
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <a data-toggle="modal" data-target="#modaledit{{$user->id}}"
                                                   class="btn btn-sm btn-primary"
                                                >
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <div class="modal fade" id="modaledit{{$user->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form method="post" action="{{route('department.update', ['id' => $user->id])}}" enctype="multipart/form-data">
                                                                @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Full Name *</label>
                                                                            <input id="oldpass" type="text" value="{{$user->name}}" class="form-control" name="name"
                                                                                   required="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputFile">Email *</label>
                                                                            <input id="password-confirm" type="email" readonly value="{{$user->email}}" class="form-control"
                                                                                   required="" name="email">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputFile">Password *</label>
                                                                            <input id="password-confirm" type="password" class="form-control"
                                                                                   name="password">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Submit</button>

                                                            </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
