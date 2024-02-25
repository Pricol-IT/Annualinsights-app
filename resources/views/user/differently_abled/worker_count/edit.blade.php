@extends('layout.app')
@section('title')
{{__('Create link')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('differently_abled.workercount.update',$data->id)}}" method="POST">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Fill Employee Count</h4>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class=" d-flex justify-content-around">
                                    <p>Financial year: {{$data->year}}</p>
                                    <input type="hidden" name="year" value="{{$data->year}}">
                                    <p>Month: {{$data->month}}</p>
                                    <input type="hidden" name="month" value="{{$data->month}}">
                                    <p>Location: {{$data->loction}}</p>
                                    <input type="hidden" name="loction" value="{{$data->loction}}">
                                </div>
                            </div>

                            <div class="card-body p-4">
                                <h4 class="p-3 text-center">Permanent Employee</h4>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Male<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="pw_male" id="pw_male" class="form-control class " value="{{$data->pw_male}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Female<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="pw_female" id="pw_female" class="form-control class " value="{{$data->pw_female}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>




                            </div>

                            <div class="card-body p-4">
                                <h4 class="p-3 text-center">Temporary Employee</h4>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Male<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="tw_male" id="tw_male" class="form-control class " value="{{$data->tw_male}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Female<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="tw_female" id="tw_female" class="form-control class " value="{{$data->tw_female}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <div>
                    <center>
                        <input type="submit" class="btn btn-success" value='Send for Approval'>
                        <input type="submit" class="btn btn-primary" value='Save'>
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
                    </center>
                </div>
            </form>
        </div>
    </div>
</main><!-- End #main -->
@endsection
