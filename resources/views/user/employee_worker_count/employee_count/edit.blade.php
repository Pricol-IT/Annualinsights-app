@extends('layout.app')
@section('title')
{{__('Create link')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('employeecount.update',$data->id)}}" method="POST">
                @csrf
                @method('post')
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
                                    <input type="hidden" name="process" value="update">
                                </div>
                            </div>

                            <div class="card-body p-4">
                                <h4 class="p-3 text-center">Permanent Employees</h4>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Male<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="pe_male" id="pe_male" class="form-control class " value="{{$data->pe_male}}" placeholder="no.of.person">
                                    </div>


                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Female<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="pe_female" id="pe_female" class="form-control class " value="{{$data->pe_female}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Third Gender<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="pe_other" id="pe_other" class="form-control class " value="{{$data->pe_other}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>


                            </div>

                            <div class="card-body p-4">
                                <h4 class="p-3 text-center">Temporary Employees</h4>
                                <div class="form-group row center">
                                    <label class="col-sm-5 col-form-label">
                                        Male<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="te_male" id="te_male" class="form-control class " value="{{$data->te_male}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Female<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="te_female" id="te_female" class="form-control class " value="{{$data->te_female}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Third Gender<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="te_other" id="te_other" class="form-control class " value="{{$data->te_other}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>


                            </div>
                            <input type="hidden" name="pw_male" id="pw_male" class="form-control class " value="{{$data->pw_male}}" >
                            <input type="hidden" name="pw_female" id="pw_female" class="form-control class " value="{{$data->pw_female}}" >
                            <input type="hidden" name="pw_other" id="pw_other" class="form-control class " value="{{$data->pw_other}}" >
                            <input type="hidden" name="tw_male" id="tw_male" class="form-control class " value="{{$data->tw_male}}" >
                            <input type="hidden" name="tw_female" id="tw_female" class="form-control class " value="{{$data->tw_female}}" >
                            <input type="hidden" name="tw_other" id="tw_other" class="form-control class " value="{{$data->tw_other}}" >

                        </div>
                    </div>
                </div>
                <div>
                    <center>
                        <input type="submit" name="submit" class="btn btn-success" value='Send for Approval'>
                        <input type="submit" name="submit" class="btn btn-primary" value='Save'>
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
                    </center>
                </div>
            </form>
        </div>
    </div>
</main><!-- End #main -->
@endsection
