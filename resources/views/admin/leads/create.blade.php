@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lead</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Lead</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                         <form action="{{ route('lead.store') }}" method="post">
                           @csrf
                <div class="card-body">
                 <div class="row">
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">First Name *</label>
                      <input id="oldpass" type="text" class="form-control" name="firstname" required="">
                    </div>
                   </div>
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Last Name *</label>
                       <input id="password" type="text" class="form-control" name="lastname" required="">
                    </div>
                   </div>
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">Email *</label>
                       <input id="password-confirm" type="email" class="form-control" name="email" >
                   </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phone *</label>
                      <input id="oldpass" type="number" class="form-control" name="phone" required="">
                    </div>
                   </div>
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Country *:</label>
                       <input id="password" type="text" class="form-control" name="country" required="">
                    </div>
                   </div>
                   <div class="col-md-6">
                    <div class="form-group">
                        <label>Status *</label>
                        <select class="form-control" name="status" required="">
                          <option value="1">New</option>
                          <option value="2">Call Back</option>
                          <option value="3">No Answer</option>
                          <option value="4">New No Answer</option>
                          <option value="5">Done</option>
                          <option value="6">Done in the Money</option>
                          <option value="7">Not Intrested</option>
                          <option value="8">What's No Answer</option>
                          <option value="9">Try Again</option>
                        </select>
                      </div>
                  </div>
                   <div class="col-md-12">
                      <div class="form-group">
                  <label>Call Back Date and time:</label>
                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                        <input type="text"  class="form-control datetimepicker-input" name="call_date" data-target="#reservationdatetime"/>
                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                  </div>
                 <!--  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Call Back Time</label>
                      <input id="oldpass" type="time" class="form-control">
                    </div>
                   </div> -->
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Follow up Date:</label>
                       <input id="password" type="date"  class="form-control" name="follow_date">
                    </div>
                   </div>
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">Source:</label>
                       <input id="password-confirm" type="text" class="form-control" name="source" required="">
                   </div>
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->





          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
