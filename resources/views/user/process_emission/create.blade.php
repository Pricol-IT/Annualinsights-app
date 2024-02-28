@extends('layout.app')
@section('title')
{{__('Create link')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('process_emission.store')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Fill the
                            Stationary Combustion values</h4>
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
                                        Process type <span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="processtype" id="processtype">
                                            @foreach ($processtypes as $processtype)
                                            <option value={{$processtype}}>{{$processtype}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">If Other
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="processtype_other" id="processtype_other" class="form-control class " placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Name of Input Material
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="input" id="input" class="form-control class " placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Annual Amount Consumed
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="input_total_amount" id="input_total_amount" class="form-control class " placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Unit<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="input_unit" id="input_unit">
                                            @foreach ($units as $unit)
                                            <option value={{$unit}}>{{$unit}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Name of Output Material
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="output" id="output" class="form-control class " placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Annual Amount Produced
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="output_total_amount" id="output_total_amount" class="form-control class " placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Unit<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="output_unit" id="output_unit">
                                            @foreach ($units as $unit)
                                            <option value={{$unit}}>{{$unit}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>





                        </div>
                    </div>
                </div>
                <div>
                    <center>
                        {{-- <input type="submit" class="btn btn-success" value='Send for Approval'>
                        <input type="submit" class="btn btn-primary" value='Save'> --}}
                        <input type="submit" class="btn btn-primary" value='Submit'>
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
                    </center>
                </div>
            </form>
        </div>
    </div>
</main><!-- End #main -->
@endsection
