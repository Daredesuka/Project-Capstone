@extends('admin.layouts.main')
@section('title','History Report | CSR')
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

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">History Report</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">History Report</li>
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
            <form action="{{url('admin/hreport/day/search')}}" method="GET" enctype="multipart/form-data">
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="price" class="col-md-2 col-form-label">From Date</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="date" id="date1" name="date1" value="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="price" class="col-md-2 col-form-label">For Date</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="date" id="date2" name="date2" value="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="price" class="col-md-2 col-form-label"></label>
                                        <div class="col-md-10">
                                            <button class="btn btn-success" type="submit"> Search</button>
                                            <a href="{{url('admin/hreport/day/cetakpdf/?date1='.Request::get('date1').'&date2='.Request::get('date2'))}}"
                                                class="btn btn-warning" target="_blank">Export PDF</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Status Karyawan</th>
                                    <th>Departemen</th>
                                    <th>Kategori Bahaya</th>
                                    <th>Isi Laporan</th>
                                    <th>Lokasi Kejadian</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->status_karyawan}}</td>
                                    <td>{{$item->departemen}}</td>
                                    <td>{{$item->kategori_bahaya}}</td>
                                    <td>{{$item->contents_of_the_report}}</td>
                                    <td>{{$item->lokasi_kejadian}}</td>
                                    <td>{{$item->date_report}}</td>
                                    @if ($item->status == "0")
                                    <td><span class="badge rounded-pill bg-danger">Unprocessed</span></td>
                                    @elseif($item->status == 'process')
                                    <td><span class="badge rounded-pill bg-primary">Processed</span></td>
                                    @else
                                    <td><span class="badge rounded-pill bg-success">Finished</span></td>
                                    @endif
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
<script>
$('.btn-delete').click(function() {
    var paket_id = $(this).attr('paket-id');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mt-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: !0,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: "btn btn-success mt-2",
        cancelButtonClass: "btn btn-danger ms-2 mt-2",
        buttonsStyling: !1
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "{{url('admin/transaction/delete')}}/" + paket_id + "";
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })
});
$(document).ready(function() {
    $(document).on('click', '#set_dtl', function() {
        var outlet = $(this).data('outlet');
        var type = $(this).data('type');
        var paket_name = $(this).data('paket_name');
        var price = $(this).data('price');
        var created = $(this).data('created');
        var updated = $(this).data('updated');
        $('#outlet').text(outlet);

        $('#type').text(type);
        $('#paket_name').text(paket_name);
        $('#price').text(price);
        $('#created').text(created);
        $('#updated').text(updated);
    })
})
</script>
@endpush