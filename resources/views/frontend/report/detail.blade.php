@extends('frontend.layouts.main')
@section('title','Detail Report | CSR')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Detail Report</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Detail Report</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    Contoh
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
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
                                                            data-title="Enter username">{{ date('d F Y H:i:s', strtotime($report->created_at)) }}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>
                                                        @if ($report->status == '0')
                                                        <span class="badge rounded-pill bg-danger">Unprocess</span>
                                                        @elseif($report->status == "process")
                                                        <span class="badge rounded-pill bg-primary">Process</span>
                                                        @else
                                                        <span class="badge rounded-pill bg-success">Finished</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Photo</td>
                                                    <td>
                                                        <img src="{{ Storage::disk('s3')->url('avatar_report/' . $report->photo) }}"
                                                            width="500px">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Isi Laporan</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username"
                                                            data-type="text" data-pk="1"
                                                            data-title="Enter username">{{ $report->contents_of_the_report }}</a>
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
                                                        <a href="javascript::void(0)" id="inline-username"
                                                            data-type="text" data-pk="1"
                                                            data-title="Enter username">{{ $report->Response->response }}</a>
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
    </div> <!-- container-fluid -->
</div>
@endsection