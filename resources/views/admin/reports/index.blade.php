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
                                    <h5>Name of State: Plateau </h5>
                                    <span>Reporting Year: {{ date("Y") }}</span>
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
                                                <h5>State Domestic Arrears Stock Reporting</h5>
                                              
                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                <table style="font-size: 11px;" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                    <tr>
                                                    <th>S/N <br><br><br><br><br><br><br></th>
                                                    <th>Arrears Type <br><br><br><br><br><br>In Naira</th>
                                                    <th>Outstanding <br> Arrears At <br> December 31 <br> 2017 (Stock)<br><br><br><br></th>
                                                    <th>New Arrears <br> Incurred in <br> 2018 (Flow)<br><br><br><br><br></th>
                                                    <th>Arrears <br> Settled (Paid) <br> In 2018 (Flow)<br><br><br><br><br></th>
                                                    <th>Outstanding <br> Arrears At <br> December 31 <br> 2018 (Stock)<br><br><br><br></th>
                                                    <th>New Arrears <br> Incurred In <br> 2019 (Flow)<br><br><br><br><br></th>
                                                    <th>Arrears <br> Settled (Paid) <br> In 2019 (Flow) <br><br><br><br><br></th>
                                                    <th>Outstanding <br> Arrears At <br> December 31, <br> 2019 (Stock)<br><br><br><br></th>
                                                    <th>Changes In <br> Arrears  <br> Between <br> December 31 <br> 2018 And <br> December 31 <br> 2019<br></th>
                                                    <th> % Changes In <br> Arrears  <br> Between <br> December 31 <br> 2018 And <br> December 31 <br> 2019</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Contractor's Arrears</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ isset($incurred_amount) ? number_format($incurred_amount, 2) : "" }}</td>
                                                        <td>{{ isset($settled_amount) ? number_format($settled_amount, 2) : "" }}</td>
                                                        <td>{{ isset($outstanding_amount) ? number_format($outstanding_amount, 2) : "" }}</td>
                                                        <td>{{ isset($total1_changes) ? number_format($total1_changes, 2) : "" }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Pension And Gratuity <br> Arrears</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ isset($incurred_amount1) ? number_format($incurred_amount1, 2) : "" }}</td>
                                                        <td>{{ isset($settled_amount1) ? number_format($settled_amount1, 2) : "" }}</td>
                                                        <td>{{ isset($outstanding_amount1) ? number_format($outstanding_amount1, 2) : "" }}</td>
                                                        <td>{{ isset($total2_changes) ? number_format($total2_changes, 2) : ""}}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Salary Arrears And Other <br> Staff Claims Arrears</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ isset($incurred_amount2) ? number_format($incurred_amount2, 2) : "" }}</td>
                                                        <td>{{ isset($settled_amount2) ? number_format($settled_amount2, 2) : "" }}</td>
                                                        <td>{{ isset($outstanding_amount2) ? number_format($outstanding_amount2, 2) : "" }}</td>
                                                        <td>{{ isset($total3_changes) ? number_format($total3_changes, 2) : "" }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <!-- <td>Other Arrears - Type X</td> -->
                                                        <td>Judgement Debt</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>0.00</td>
                                                        <td>0.00</td>
                                                        <td>0.00</td>
                                                        <td>0.00</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Other Arrears - Type Y</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr style="color: blue;">
                                                        <td></td>
                                                        <td><b>Total of all <br> Arrears Type</b></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ isset($incurred_amount) + isset($incurred_amount1) + isset($incurred_amount2) ? number_format($incurred_amount + $incurred_amount1 + $incurred_amount2, 2) : "" }}</td>
                                                        <td>{{ isset($settled_amount) + isset($settled_amount1) + isset($settled_amount2) ? number_format($settled_amount + $settled_amount1 + $settled_amount2, 2) : ""}}</td>
                                                        <td>{{ isset($outstanding_amount) + isset($outstanding_amount1) + isset($outstanding_amount2) ? number_format($outstanding_amount + $outstanding_amount1 + $outstanding_amount2, 2) : "" }}</td>
                                                        <td>{{ isset($total1_changes) + isset($total2_changes) + isset($total3_changes) ? number_format($total1_changes + $total2_changes + $total3_changes, 2) : "" }}</td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
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
