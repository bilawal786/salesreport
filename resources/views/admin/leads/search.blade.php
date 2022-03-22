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
              <li class="breadcrumb-item active">Leads</li>
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
                <a href="{{route('lead.export')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-up"></i>  Export Leads</a>
                <a href="" class="btn btn-sm btn-dark"  data-toggle="modal" data-target="#modal-default"><i class="fa fa-arrow-down"></i>  Import Leads</a>
               <a href="{{route('lead.create')}}" class="btn btn-sm btn-success" style="float: right;"><i class="fa fa-plus"></i>  Add New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Last Modified</th>
                    <th style="width: 90px;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($lead as $row)
                  <tr>
                    <td>{{$row->firstname}} {{$row->lastname}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->phone}}</td>
                    <td>{{$row->country}}</td>
                    <td>
                      @php
                      $status = $row->status;
                      @endphp
                      @if ($status == 1)
                      <span class="badge badge-info">New</span>
                      @elseif ($status == 2)
                      <span class="badge badge-success">Call back</span>
                      @elseif ($status == 3)
                      <span class="badge badge-dark">No Answer</span>
                      @elseif ($status == 4)
                      <span class="badge badge-danger">New No Answer</span>
                      @elseif ($status == 5)
                      <span class="badge badge-warning">Done</span>
                      @elseif ($status == 6)
                      <span class="badge" style="background-color: pink;">Done with Money</span>
                      @elseif ($status == 7)
                      <span class="badge" style="background-color: #00FFFF;">Not Intrested</span>
                      @elseif ($status == 8)
                      <span class="badge" style="background-color: #FFFF00;">Whats No Answer</span>
                      @elseif ($status == 9)
                      <span class="badge badge-secondary">Try Again</span>
                      @endif
                    </td>
                     <td>{{$row->create_date->format('m/d/Y')}}</td>
                    <td>{{$row->modifiy_date->format('m/d/Y')}}</td>
                     <td>
                        <a href="{{route('lead.comment' , ['id'=>$row->id])}}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Comment">
                            <i class="fa fa-comment"></i>
                        </a>

                        <a href="{{route('lead.edit' , ['id'=>$row->id])}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="edit">
                            <i class="fa fa-pen"></i>
                        </a>

                        <a href="{{route('lead.delete' , ['id'=>$row->id])}}" class="btn btn-sm btn-danger" data-toggle="tooltip" id="delete" title="Delete">
                              <i class="fa fa-times"></i>
                        </a>
                     </td>
                  </tr>
                   @endforeach
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
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Import Leads</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="{{route('lead.import')}}" enctype="multipart/form-data">
                @csrf
                <input type="file" name="excel" required="">
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Import</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  @endsection