@extends('admin.layouts.main')
@section('content')

  @include('admin.partials.loader')

  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

      @include('admin.partials.navbar')
     
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">

            @include('admin.partials.sidebar')

                    <div class="pcoded-content">

                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="feather icon-home bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>Dashboard</h5>
                                            <span>Finance Debt Management Department</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">

                                        <div class="row">

                                            <div class="col-md-12 col-xl-10">
                                                <div class="card sale-card">
                                                    <div class="card-header">
                                                        <h5>Supports Messages</h5>
                                                    </div>
                                                    <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="order-table" class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                            <tr>
                                                            <th>No</th>
                                                            <th>File No</th>
                                                            <th>Message</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if(count($datas) > 0)
                                                            @foreach($comments as $data)
                                                            <tr>
                                                                <td>{{ ++$i }}</td>
                                                                <td></td>
                                                                <td>{{ $data->body }}</td>
                                                                <td>{{ $data->created_at->format('F d, Y h:ia') }}</td>
                                
                                                                <td className="text-right">
                                                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $data->id }}">
                                                                        <span class="glyphicon glyphicon-edit"></span> Reply
                                                                    </button>
                                                                    <a href="{{route('comments.delete', $data->id)}}">
                                                                    <button class="btn btn-danger btn-sm">
                                                                            <span class="glyphicon glyphicon-trash"></span> Delete
                                                                    </button>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                            <td colspan="8" class="text-center">
                                                                <h4 class="card-title">No Messages received yet.</h4>
                                                            </td>
                                                            </tr>
                                                        @endif
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                            <th>No</th>
                                                            <th>File No</th>
                                                            <th>Message</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                        </table>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-2">
                                                <div class="card comp-card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h6 class="m-b-25">MDAs</h6>
                                                                <h3 class="f-w-700 text-c-blue"></h3>
                                                                <p class="m-b-0"><b>{{ $mdas->count() }}</b></p>
                                                            </div>
                                                            <!-- <div class="col-auto">
                                                                <i class="fas fa-eye bg-c-blue"></i>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card comp-card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h6 class="m-b-25">Economic Categories</h6>
                                                                <h3 class="f-w-700 text-c-green"></h3>
                                                                <p class="m-b-0"><b>{{ $economy->count() }}</b></p>
                                                            </div>
                                                            <!-- <div class="col-auto">
                                                                <i class="fas fa-bullseye bg-c-green"></i>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card comp-card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h6 class="m-b-25">Arrears Recorded</h6>
                                                                <h3 class="f-w-700 text-c-yellow"></h3>
                                                                <p class="m-b-0"><b>{{ $datas->count() }}</b></p>
                                                            </div>
                                                            <!-- <div class="col-auto">
                                                                <i class="fas fa-hand-paper bg-c-yellow"></i>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-12">
                                                <div class="card proj-progress-card">
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <!-- <div class="col-xl-3 col-md-6">
                                                                <h6>Published Project</h6>
                                                                <h5 class="m-b-30 f-w-700">532<span
                                                                        class="text-c-green m-l-10">+1.69%</span></h5>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-red"
                                                                        style="width:25%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-md-6">
                                                                <h6>Completed Task</h6>
                                                                <h5 class="m-b-30 f-w-700">4,569<span
                                                                        class="text-c-red m-l-10">-0.5%</span></h5>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-blue"
                                                                        style="width:65%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-md-6">
                                                                <h6>Successfull Task</h6>
                                                                <h5 class="m-b-30 f-w-700">89%<span
                                                                        class="text-c-green m-l-10">+0.99%</span></h5>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-green"
                                                                        style="width:85%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-md-6">
                                                                <h6>Ongoing Project</h6>
                                                                <h5 class="m-b-30 f-w-700">365<span
                                                                        class="text-c-green m-l-10">+0.35%</span></h5>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-yellow"
                                                                        style="width:45%"></div>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="styleSelector">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Edit Modal -->
    @foreach($comments as $modal)
    <div class="modal fade" id="editModal{{ $modal->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reply Client's Arrears Messages</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> 
        </div>
        <div class="modal-body">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif 
        
        <form method="post" action="">

                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <!-- <input type="text" class="form-control" value="{{ $modal->body }}" readonly> -->
                    <textarea class="form-control" name="body" rows="3" readonly>{{ $modal->body }}</textarea>
                    <br>
                    <textarea class="form-control" name="body" rows="5"></textarea>
                </div>
        
                <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm pull-right">Send Reply</button>
                <div class="clearfix"></div>
            </form>


        </div>

        </div>
    </div>
    </div>
    @endforeach
    @endsection