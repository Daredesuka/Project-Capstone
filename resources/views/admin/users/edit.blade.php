@extends('admin.layouts.main')
@section('title','Management User | CSR')
@section('css')

@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Edit Users</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Edit Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <a href="{{route('users.index')}}" class="button"><i class="bx bx-arrow-back label-icon"></i>
                    &nbsp;&nbsp;Back To List User</a>
                <br>
                <br>
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
            <form action="{{url('admin/users/update/'.$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="officer_name" class="col-md-2 col-form-label">Officer Name</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" id="officer_name"
                                                name="officer_name" value="{{$user->officer_name}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="username" class="col-md-2 col-form-label">Username</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" id="username" name="username"
                                                value="{{$user->username}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="email" class="col-md-2 col-form-label">Email</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="email" id="email" name="email"
                                                value="{{$user->email}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="phone_number" class="col-md-2 col-form-label">Phone Number</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="number" id="phone_number"
                                                name="phone_number" value="{{$user->phone_number}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="photo" class="col-md-2 col-form-label">Photo</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="file" id="photo" name="photo">
                                            <small><span>(Leave blank if you don't want to change the
                                                    photo)</span></small>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="level_id" class="col-md-2 col-form-label">Privilege</label>
                                        <div class="col-md-10">
                                            <select class="form-select select2" id="level_id" name="level_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach ($level as $row)
                                                <option @if($row->id==$user->level_id) selected @endif
                                                    value="{{ $row->id}}">{{$row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="password" class="col-md-2 col-form-label">Password</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="password" id="password" name="password">
                                            <small><span>(Leave blank if you don't want to change the
                                                    password)</span></small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="alert-form">
                                        <img src="{{secure_asset('assets/images/info.png')}}" class="img-info-form">
                                        Mohon lengkapi form yang sudah di sediakan untuk dapat melanjutkan proses !
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{route('users.index')}}" class="btn btn-danger">Cancel</a>
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
<script src="{{secure_asset('assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{secure_asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{secure_asset('assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
<script src="{{secure_asset('assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{secure_asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{secure_asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{secure_asset('assets/libs/%40chenfengyuan/datepicker/datepicker.min.js')}}"></script>
<script src="{{secure_asset('assets/js/pages/form-advanced.init.js')}}"></script>
@endpush