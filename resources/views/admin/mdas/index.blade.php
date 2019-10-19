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
                                <i class="feather icon-watch bg-c-blue"></i>
                                <div class="d-inline">
                                    <h5>Registered MDAs (Debtors) page</h5>
                                    <span>Registered MDAs Table</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class=" breadcrumb breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="/dashboard"><i class="feather icon-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">Registered MDAs</a>
                                    </li>
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
                                    <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-block">
                                        @if(count($errors) > 0)
                                        <div class="alert alert-danger">
                                            @foreach($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                            @endforeach
                                        </div>
                                        @endif 
                                        @if(session()->get('success'))
                                        <div class="alert alert-success text-center">
                                            {{ session()->get('success') }}  
                                        </div>
                                        @endif
                                        
                                        <form method="POST" class="form-horizontal" action="{{ route('mda.add')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}              
                                            <div class="row">
                                                <div class="col-sm-2">   
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Name of MDA (Debtor)</label>
                                                </div>
                                                </div>
                                                <div class="col-sm-6">   
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control" placeholder="Enter MDA Name">
                                                </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Add MDA</button>
                                        
                                        </form>
                                        </div>
                                        
                                    </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Registered MDAs</h5>
                                                <!-- <div class="card-header-right">
                                                   <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add User</button>
                                                </div> -->
                                            </div>
                                            
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                <table id="order-table" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                    <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Date Added</th>
                                                    <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($datas) > 0)
                                                    @foreach($datas as $data)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $data->name }}</td>
                                                    
                                                        <td>{{ $data->created_at->format('F d, Y h:ia') }}</td>
                        
                                                        <td className="text-right">
                                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $data->slug }}">
                                                                <span class="glyphicon glyphicon-edit"></span> Edit
                                                            </button>
                                                            <a href="{{route('mda.delete', $data->slug)}}">
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
                                                        <h4 class="card-title">MDA Not Created yet.</h4>
                                                    </td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Date Added</th>
                                                    <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                </table>
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


<!--Edit Modal -->
@foreach($datas as $modal)
<div class="modal fade" id="editModal{{ $modal->slug }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit MDA Form</h5>
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
      
      <form method="post" action="{{ route('mda.update', $modal->slug)}}">

            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $modal->name }}">
            </div>
    
            <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm pull-right">Save</button>
            <div class="clearfix"></div>
        </form>


      </div>

    </div>
  </div>
</div>
@endforeach
@endsection
