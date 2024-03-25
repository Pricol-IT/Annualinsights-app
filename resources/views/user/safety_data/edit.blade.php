@extends('layout.app')
@section('title')
{{__('Create link')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('safety_data.update',$data->id)}}" method="POST">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Fill Union Count</h4>
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
                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        No of employee<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="no_of_employee" id="no_of_employee" class="form-control class " value="{{$data->no_of_employee}}" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">No of working day<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="no_of_working_day" id="no_of_working_day" class="form-control class " value="{{$data->no_of_working_day}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Last date of accient<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="last_date_of_accient" id="last_date_of_accient" class="form-control class " value="{{$data->last_date_of_accient}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">First aid cases<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="first_aid_cases" id="first_aid_cases" class="form-control class " value="{{$data->first_aid_cases}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Non recordable injury<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="non_recordable_injury" id="non_recordable_injury" class="form-control class " value="{{$data->non_recordable_injury}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Recordable injury<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="recordable_injury" id="recordable_injury" class="form-control class " value="{{$data->recordable_injury}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Man days lost<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="man_days_lost" id="man_days_lost" class="form-control class " value="{{$data->man_days_lost}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Near miss<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="near_miss" id="near_miss" class="form-control class " value="{{$data->near_miss}}" placeholder="Enter no.of.person">
                                    </div>
                                </div>

                                {{-- <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">No of kaizen<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="no_of_kaizen" id="no_of_kaizen" class="form-control class " value="{{$data->no_of_kaizen}}" placeholder="Enter no.of.person">
                                    </div>

                                </div>
                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Ehs training<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="ehs_training" id="ehs_training" class="form-control class " value="{{$data->ehs_training}}" placeholder="Enter no.of.person">
                                    </div>
                                </div> --}}

                            </div>

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
