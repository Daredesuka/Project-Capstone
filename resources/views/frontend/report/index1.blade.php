@extends('frontend.layouts.main')
@section('title','List Report | CSR')
@section('css')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Report</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Report</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Photo</th>
                                    <th>Date Reports</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($report as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{url('avatar_report/',$row->photo)}}" width="120px"></td>
                                    <td>{{date('d F Y H:i:s',strtotime($row->created_at))}}</td>
                                    @if ($row->status == '0')
                                    <td><span class="badge rounded-pill bg-danger">Unprocess</span></td>
                                    @elseif($row->status == "process")
                                    <td><span class="badge rounded-pill bg-primary">Process</span></td>
                                    @else
                                    <td><span class="badge rounded-pill bg-success">Finished</span></td>
                                    @endif
                                    <td>
                                        <a href="{{url('user/report/detail/'.$row->id)}}" class="btn btn-info">
                                            Detail
                                        </a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
@push('script')
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
@endpush