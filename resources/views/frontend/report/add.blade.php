@extends('frontend.layouts.main')
@section('title','Add Report | CSR')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Report</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Add Report</li>
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
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <form action="{{url('user/report/save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="name" class="col-md-2 col-form-label">Nama</label>
                                        <div class="col-md-10">
                                            <input type="text" class=" form-control" rows="8" cols="50" name="name"
                                                id="name">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="status_karyawan" class="col-md-2 col-form-label">Status
                                            Karyawan</label>
                                        <div class="col-md-10">
                                            <select class="form-select" name="status_karyawan" id="status_karyawan">
                                                <option value="">Pilih Status Karyawan</option>
                                                <option value="Pegawai Tetap">Tetap/Permanent</option>
                                                <option value="Kontrak">Kontrak/Temporary</option>
                                                <option value="Magang">Pihak Ketiga (Kontraktor/Vendor/Auditor dll) /
                                                    Third Party</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="departemen" class="col-md-2 col-form-label">Departemen</label>
                                        <div class="col-md-10">
                                            <select class="form-select" name="departemen" id="departemen">
                                                <option value="">Pilih Departemen</option>
                                                <option value="EHS">EHS</option>
                                                <option value="Production">Production</option>
                                                <option value="Maintenance">Maintenance</option>
                                                <option value="Supply Chain">Supply Chain/Warehouse</option>
                                                <option value="Quality/R&D">Quality/R&D</option>
                                                <option value="HR/IT/Purchasing/Finance/Sales">
                                                    HR/IT/Purchasing/Finance/Sales</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="kategori_bahaya" class="col-md-2 col-form-label">Kategori
                                            Bahaya</label>
                                        <div class="col-md-10">
                                            <select class="form-select" name="kategori_bahaya" id="kategori_bahaya">
                                                <option value="">Pilih Kategori Bahaya</option>
                                                <option value="Tindakan_Tidak_Aman">Tindakan Tidak Aman</option>
                                                <option value="Kondisi_Tidak_Aman">Kondisi Tidak Aman</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="contents_of_the_report" class="col-md-2 col-form-label">Isi
                                            Laporan</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" rows="8" cols="50"
                                                name="contents_of_the_report" id="contents_of_the_report"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="lokasi_kejadian" class="col-md-2 col-form-label">Lokasi
                                            Kejadian</label>
                                        <div class="col-md-10">
                                            <input type="text" class=" form-control" rows="8" cols="50"
                                                name="lokasi_kejadian" id="lokasi_kejadian">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="photo" class="col-md-2 col-form-label">Photo</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="file" id="photo" name="photo">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="photo" class="col-md-2 col-form-label"></label>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-success">Submit</button>
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