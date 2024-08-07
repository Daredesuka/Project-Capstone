@extends('admin.layouts.main')
@section('title','Management User | CSR')
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
                    <h4 class="mb-sm-0 font-size-18">Users Manajement</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="{{route('users.create')}}" class="btn btn-success waves-effect btn-label waves-light"><i
                        class="bx bxs-plus-square label-icon"></i> Add</a>
                <button type="button" class="btn btn-danger" id="deleteAllSelectedRecords">Delete Selected</button>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">



                        <table id="" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check font-size-16 align-middle">
                                            <input class="form-check-input" type="checkbox" id="chkCheckAll">
                                            <label class="form-check-label" for="chkCheckAll"></label>
                                        </div>
                                    </th>
                                    <th>No</th>
                                    <th>Photo</th>
                                    <th>Officer Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Phone Number</th>
                                    <th>Privilege</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($users as $row)
                                <tr id="sid{{$row->id}}">
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" name="ids" type="checkbox"
                                                id="transactionCheck02" value="{{$row->id}}">
                                            <label class="form-check-label" for="transactionCheck02"></label>
                                        </div>
                                    </td>
                                    <td>{{$loop->iteration}}</td>
                                    @if ($row->photo == NULL)
                                    <td><span class="badge rounded-pill bg-danger">Emtpy</span></td>
                                    @else
                                    <td><img src="{{ Storage::disk('s3')->url('avatar/' . $row->photo) }}"
                                            width="100px"></td>
                                    @endif
                                    <td>{{$row->officer_name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->username}}</td>
                                    <td>{{$row->phone_number}}</td>
                                    <td>
                                        <span class="badge rounded-pill bg-primary">{{$row->Level->name}}</span>
                                    </td>

                                    <td>
                                        <a href="{{url('admin/users/edit/'.$row->id)}}"
                                            class="btn btn-danger btn-rounded waves-effect waves-light">
                                            <i class="bx bx-edit font-size-16 align-middle"></i>
                                        </a>
                                        <a href="javascript: void(0);"
                                            class="btn btn-warning btn-rounded waves-effect waves-light btn-delete"
                                            title="Delete Data" user-id="{{$row->id}}">
                                            <i class="bx bx-trash-alt font-size-16 align-middle"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
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
$('.btn-delete').click(function() {
    var user_id = $(this).attr('user-id');
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
            window.location = "{{url('admin/users/delete')}}/" + user_id + "";
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
$(function(e) {
    $("#chkCheckAll").click(function() {
        $(".form-check-input").prop('checked', $(this).prop('checked'));
    });

    $('#deleteAllSelectedRecords').click(function(e) {
        e.preventDefault();
        var allids = [];
        $("input:checkbox[name=ids]:checked").each(function() {
            allids.push($(this).val());
            alert('oke')
        });

        $.ajax({
            url: "{{route('users.deleteSelected ')}}",
            type: 'DELETE',
            data: {
                ids: allids,
                _token: $('input[name=_token]').val()
            },
            success: function(response) {
                $.each(allids, function(key, val) {
                    $('#sid' + val).remove();
                })
            }
        });
    });
});
</script>
@endpush