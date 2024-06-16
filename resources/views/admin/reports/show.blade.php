@extends('admin.layouts.main')
@section('title','Show Reports | CSR')
@section('css')
<link href="{{secure_asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{secure_asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{secure_asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
    rel="stylesheet" type="text/css" />
<link href="{{secure_asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Detail Reports</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Detail Reports</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <br>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <br>
        <div class="row">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Detail Report</h4>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-nowrap mb-0">
                                            <br>
                                            <tbody>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username"
                                                            data-type="text" data-pk="1"
                                                            data-title="Enter username">{{ $report->name}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status Karyawan</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username"
                                                            data-type="text" data-pk="1"
                                                            data-title="Enter username">{{ $report->status_karyawan}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Departemen</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username"
                                                            data-type="text" data-pk="1"
                                                            data-title="Enter username">{{ $report->departemen}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kategori Bahaya</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username"
                                                            data-type="text" data-pk="1"
                                                            data-title="Enter username">{{ $report->kategori_bahaya}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Date</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username"
                                                            data-type="text" data-pk="1"
                                                            data-title="Enter username">{{date('d F Y H:i:s',strtotime($report->created_at))}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>
                                                        @if ($report->status == '0')
                                                        <span class="badge rounded-pill bg-danger">Belum Di
                                                            Proses</span>
                                                        @elseif($report->status == "process")
                                                        <span class="badge rounded-pill bg-primary">Sedang Di
                                                            Proses</span>
                                                        @else
                                                        <span class="badge rounded-pill bg-success">Finished</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Photo</td>
                                                    <td>
                                                        <img src="{{url('avatar_report/',$report->photo)}}"
                                                            width="500px">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Isi Laporan</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username"
                                                            data-type="text" data-pk="1"
                                                            data-title="Enter username">{{$report->contents_of_the_report}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Lokasi Kejadian</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username"
                                                            data-type="text" data-pk="1"
                                                            data-title="Enter username">{{ $report->lokasi_kejadian }}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Respon</td>
                                                    <td>
                                                        @if (empty($response->response))
                                                        <a href="javascript::void(0)" id="inline-username"
                                                            data-type="text" data-pk="1" data-title="Enter username">Not
                                                            response yet</a>
                                                        @else
                                                        <a href="javascript::void(0)" id="inline-username"
                                                            data-type="text" data-pk="1"
                                                            data-title="Enter username">{{$response->response}}</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <a href="{{url('admin/reports/show',$report->id)}}"
                                                            class="btn btn-info">Give feedback</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
@push('script')
<script src="{{secure_asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{secure_asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{secure_asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{secure_asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{secure_asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{secure_asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script>
$(document).ready(function() {
    // Event listener for the delete button
    $('.btn-delete').click(function() {
        var report_id = $(this).attr('report-id');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mt-2',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: "btn btn-success mt-2",
            cancelButtonClass: "btn btn-danger ms-2 mt-2",
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "{{url('admin/reports/delete')}}/" + report_id;
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your report is safe :)',
                    'error'
                );
            }
        });
    });
});
</script>
@endpush