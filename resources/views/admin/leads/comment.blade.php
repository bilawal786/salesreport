@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lead</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Comments</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
{{--        <div class="row">--}}
{{--          <div class="col-12">--}}
{{--    --}}


{{--            <!-- Main content -->--}}
{{--            <div class="invoice p-3 mb-3">--}}
{{--              <!-- title row -->--}}
{{--              <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                </div>--}}
{{--                <!-- /.col -->--}}
{{--              </div>--}}
{{--              <!-- info row -->--}}
{{--              <div class="row invoice-info">--}}
{{--                <div class="col-sm-4 invoice-col">--}}
{{--                  --}}
{{--                  --}}
{{--                  <b>Follow up date:</b> {{$lead->follow_date->format('m/d/Y')}}<br>--}}
{{--                  <b>Call Back date & time:</b> {{$lead->call_date}}<br>--}}
{{--  --}}
{{--                </div>--}}
{{--                <!-- /.col -->--}}
{{--                <div class="col-sm-4 invoice-col">--}}
{{--                  --}}
{{--                </div>--}}
{{--                <!-- /.col -->--}}
{{--                <div class="col-sm-4 invoice-col">--}}
{{--                 --}}
{{--                  --}}
{{--                  <b>Created at:</b> {{$lead->create_date->format('m/d/Y')}}<br>--}}
{{--                  <b>Last Modify at:</b> {{$lead->modifiy_date->format('m/d/Y')}}<br>--}}
{{-- --}}
{{--                </div>--}}
{{--                <!-- /.col -->--}}
{{--              </div>--}}
{{--              <!-- /.row -->--}}

{{--              <!-- Table row -->--}}
{{--              <div class="row" style="margin-top: 30px;">--}}
{{--                <div class="col-12 table-responsive">--}}
{{--                  <table class="table table-striped">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                      <th>First Name</th>--}}
{{--                      <th>Last Name</th>--}}
{{--                      <th>Email</th>--}}
{{--                      <th>Phone</th>--}}
{{--                      <th>Country</th>--}}
{{--                      <th>Status</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                      <td>{{$lead->firstname}}</td>--}}
{{--                      <td>{{$lead->lastname}}</td>--}}
{{--                      <td>{{$lead->email}}</td>--}}
{{--                      <td>{{$lead->phone}}</td>--}}
{{--                      <td>{{$lead->country}}</td>--}}
{{--                      <td>--}}
{{--                      	 @php--}}
{{--                      $status = $lead->status;--}}
{{--                      @endphp--}}
{{--                      @if ($status == 1)--}}
{{--                      <span class="badge badge-info">New</span>--}}
{{--                      @elseif ($status == 2)--}}
{{--                      <span class="badge badge-success">Call back</span>--}}
{{--                      @elseif ($status == 3)--}}
{{--                      <span class="badge badge-dark">No Answer</span>--}}
{{--                      @elseif ($status == 4)--}}
{{--                      <span class="badge badge-danger">New No Answer</span>--}}
{{--                      @elseif ($status == 5)--}}
{{--                      <span class="badge badge-warning">Done</span>--}}
{{--                      @elseif ($status == 6)--}}
{{--                      <span class="badge" style="background-color: pink;">Done with Money</span>--}}
{{--                      @elseif ($status == 7)--}}
{{--                      <span class="badge" style="background-color: #00FFFF;">Not Intrested</span>--}}
{{--                      @elseif ($status == 8)--}}
{{--                      <span class="badge" style="background-color: #FFFF00;">Whats No Answer</span>--}}
{{--                      @elseif ($status == 9)--}}
{{--                      <span class="badge badge-secondary">Try Again</span>--}}
{{--                      @endif--}}
{{--                      </td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                  </table>--}}
{{--                </div>--}}
{{--                <!-- /.col -->--}}
{{--              </div>--}}
{{--              <!-- /.row -->--}}

{{--              <div class="row">--}}
{{--                <!-- accepted payments column -->--}}
{{--                <div class="col-6">--}}

{{--                </div>--}}
{{--                <!-- /.col -->--}}
{{--                <div class="col-6">--}}

{{--                  <div class="table-responsive">--}}
{{--                    <table class="table">--}}
{{--                      <tr>--}}
{{--                        <th style="">Source:</th>--}}
{{--                        <td>{{$lead->source}}</td>--}}
{{--                      </tr>--}}
{{--                      --}}
{{--                    </table>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--                <!-- /.col -->--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <!-- /.invoice -->--}}
{{--          </div><!-- /.col -->--}}
{{--        </div><!-- /.row -->--}}
         <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->


            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title"><b>Comments</b></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                	@foreach($comment as $res)
                  <!-- Message. Default to the left -->

                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">{{Auth::user()->name}}</span>
                      <span class="direct-chat-timestamp float-left">{{$res->created_at->diffForHumans()}}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                     @if(!empty(Auth::user()->image))
			          <img class="direct-chat-img" src="{{asset(Auth::user()->image)}}" alt="">
			          @else
			          <img class="direct-chat-img" src="{{asset('assets/dist/img/user2-160x160.jpg')}}" alt="">
			          @endif
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      {{$res->comment}}
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>

                  @endforeach
                 </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="{{route('comment.store')}}" method="post">
                	@csrf
                  <div class="input-group">
                  	<input type="hidden" name="id" value="{{$lead->id}}">
                    <input type="text"  placeholder="Type Comment ..." class="form-control" name="comment">
                    <span class="input-group-append">
                      <button type="submit"  class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->

            <!-- TO DO List -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
@endsection
