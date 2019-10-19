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
                                    <h5>Arrears Recording page</h5>
                                    <span>Recording Arrears</span>
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
                                        <a href="#!">Arrears</a>
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
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Recording Arrears</h5>
                                                <div class="card-header-right">
                                                    <a href="{{ route('arrears.create')}}">
                                                    <button class="btn btn-primary btn-sm">Add Arrears</button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                <table id="order-table" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                    <tr>
                                                    <th>Debtor</th>
                                                    <th>Creditor</th>
                                                    <th>Arrears Owed</th>
                                                    <th>Billing Date</th>
                                                    <th>File Reference</th>
                                                    <th>Arrears State</th>
                                                    <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($datas) > 0)
                                                    @foreach($datas as $data)
                                                    <tr>
                                                        <!-- <td>{{ ++$i }}</td> -->
                                                        <td>{{ $data->debtor }}</td>
                                                        <td>{{ $data->creditor }}</td>
                                                        <td>{{ $data->arrears_owed }}</td>
                                                        <td>{{ $data->billing_date }}</td>
                                                        <td>{{ $data->file_reference }}</td>
                                                        <td>{{ $data->arrears_state }}</td>
                                                        <!-- <td>{{ $data->created_at->format('F d, Y h:ia') }}</td> -->
                        
                                                        <td className="text-right">
                                                            <a href="{{route('arrears.show', $data->slug)}}">
                                                            <button class="btn btn-info btn-sm">
                                                                <span class="glyphicon glyphicon-eye-open"></span>
                                                            </button>
                                                            </a>
                                                            <a href="{{route('arrears.edit', $data->slug)}}">
                                                            <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModal{{ $data->slug }}">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                            </button>
                                                            </a>
                                                            <a href="{{route('arrears.delete', $data->slug)}}">
                                                            <button class="btn btn-danger btn-sm">
                                                                    <span class="glyphicon glyphicon-trash"></span>
                                                            </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                    <td colspan="8" class="text-center">
                                                        <h4 class="card-title">Arrears Not Recorded yet.</h4>
                                                    </td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>Debtor</th>
                                                    <th>Creditor</th>
                                                    <th>Arrears Owed</th>
                                                    <th>Billing Date</th>
                                                    <th>File Reference</th>
                                                    <th>Arrears State</th>
                                                    <th>Actions</th>
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

@endsection
