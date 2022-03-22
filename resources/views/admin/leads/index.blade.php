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
          <div class="card card-default collapsed-card">
              <div class="card-header">
                  <h3 class="card-title">Advance Search</h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                      </button>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form action="{{route('advance.search')}}" method="post">
                      @csrf
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <!-- checkbox -->
                                          <div class="form-group clearfix">
                                              <div class="icheck-primary d-inline">
                                                  <input type="checkbox" value="1" id="checkboxPrimary2" name="new">
                                                  <label for="checkboxPrimary2">
                                                      New
                                                  </label>
                                              </div><br>
                                              <div class="icheck-primary d-inline">
                                                  <input type="checkbox" id="checkboxPrimary9" value="9" name="tryagain">
                                                  <label for="checkboxPrimary9">
                                                      Try Again
                                                  </label>
                                              </div><br>
                                              <div class="icheck-primary d-inline">
                                                  <input type="checkbox" value="7" id="checkboxPrimary7" name="notintrested">
                                                  <label for="checkboxPrimary7">
                                                      Not Intrested
                                                  </label>
                                              </div><br>
                                              <div class="icheck-primary d-inline">
                                                  <input value="3" type="checkbox" id="checkboxPrimary3" name="noanswer">
                                                  <label for="checkboxPrimary3">
                                                      No Answer
                                                  </label>
                                              </div><br>
                                              <div class="icheck-primary d-inline">
                                                  <input value="5" type="checkbox" id="checkboxPrimary5" name="done">
                                                  <label for="checkboxPrimary5">
                                                      Done
                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <!-- checkbox -->
                                          <div class="form-group clearfix">
                                              <div class="icheck-primary d-inline">
                                                  <input value="2" type="checkbox" id="checkboxPrimary1" name="callback">
                                                  <label for="checkboxPrimary1">
                                                      Call Back
                                                  </label>
                                              </div><br>
                                              <div class="icheck-primary d-inline">
                                                  <input value="4" type="checkbox" id="checkboxPrimary4" name="newonanswer">
                                                  <label for="checkboxPrimary4">
                                                      New No Answer
                                                  </label>
                                              </div><br>
                                              <div class="icheck-primary d-inline">
                                                  <input value="6" type="checkbox" id="checkboxPrimary6" name="doneinmoney">
                                                  <label for="checkboxPrimary6">
                                                      Done in the Money
                                                  </label>
                                              </div><br>
                                              <div class="icheck-primary d-inline">
                                                  <input value="8" type="checkbox" id="checkboxPrimary8" name="whatnointrested">
                                                  <label for="checkboxPrimary8">
                                                      What's No Answer
                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- /.col -->
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="exampleInputPassword1">Create Date:</label>
                                          <input id="password" type="date"  class="form-control" name="from">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="exampleInputPassword1">To:</label>
                                          <input id="password" type="date"  class="form-control" name="to">
                                      </div>
                                  </div>
                              </div>
                          </div>


                          <!-- /.col -->
                      </div>

                    <div class="row">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                  </form>
              </div>
              <!-- /.card-body -->

          </div>
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
                    <th>Call Back</th>
                    <th>Follow Up</th>
                    <th>Created at</th>
                    <th>Last Modified</th>
                    <th>Last Comment</th>
                    <th style="width: 90px;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($lead as $row)
                  <tr >
                    <td>{{$row->firstname}} {{$row->lastname}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->phone}}</td>
                    <td>{{$row->country}}</td>
                    <td>
                        <select class="form-control" name="status" onchange="location = this.value;">
                            <option value="{{$row->status}}">
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
                            </option>
                            <option value="{{route('update.status', ['value' => '1', 'id' => $row->id])}}">New</option>
                            <option value="{{route('update.status', ['value' => '2', 'id' => $row->id])}}">Call Back</option>
                            <option value="{{route('update.status', ['value' => '3', 'id' => $row->id])}}">No Answer</option>
                            <option value="{{route('update.status', ['value' => '4', 'id' => $row->id])}}">New No Answer</option>
                            <option value="{{route('update.status', ['value' => '5', 'id' => $row->id])}}">Done</option>
                            <option value="{{route('update.status', ['value' => '6', 'id' => $row->id])}}">Done in the Money</option>
                            <option value="{{route('update.status', ['value' => '7', 'id' => $row->id])}}">Not Intrested</option>
                            <option value="{{route('update.status', ['value' => '8', 'id' => $row->id])}}">What's No Answer</option>
                            <option value="{{route('update.status', ['value' => '9', 'id' => $row->id])}}">Try Again</option>
                        </select>
                    </td>
                     <td>{{$row->call_date}}</td>
                     <td>
                         @if($row->follow_date)
                             {{$row->follow_date->format('m/d/Y h:i A')}}
                         @else

                         @endif
                     </td>
                     <td>{{$row->created_at->format('m/d/Y h:i A')}}</td>
                    <td>{{$row->updated_at->format('m/d/Y h:i A')}}</td>
                      <td>
                          @php
                            $comment =  \App\Comment::where('lead_id', $row->id)->first();
                          @endphp

                          @if($comment)
                              {{$comment->comment}}
                          @else
                          @endif


                      </td>
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
