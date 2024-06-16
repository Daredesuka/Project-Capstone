@extends('admin.layouts.main')
@section('title','Show Reports | CSR')
@section('css')

@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Give feedback</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Give feedback</li>
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
            <form action="{{url('admin/reports/save',$item->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="response" class="col-md-2 col-form-label">Response</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" rows="8" cols="50" name="response"
                                                id="response"
                                                placeholder="Fill in your response">{{$item->Response->response}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Status</label>
                                        <div class="col-md-10">
                                            <select class="form-select select2" name="status">
                                                <option disabled selected>--Select--</option>
                                                <option value="0" @if($item->status == '0') selected @endif>Unprocessed
                                                </option>
                                                <option value="process" @if($item->status == 'process') selected
                                                    @endif>Process</option>
                                                <option value="finished" @if($item->status == 'finished') selected
                                                    @endif>Finished</option>


                                            </select>
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