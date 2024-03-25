@extends('layout.app')
@section('title')
{{__('Create link')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('process_emission.update',$data->id)}}" method="POST">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Fill the
                            Process Emission values</h4>
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
                                            <option value=""></option>
                                            @foreach ($processtypes as $processtype)
                                            <option value={{$processtype}} {{$data->processtype == $processtype ? 'selected': ''}}>{{$processtype}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">If Other
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="processtype_other" id="processtype_other" class="form-control class " placeholder="" value={{$data->processtype_other}}>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Name of Input Material<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="input" id="input" class="form-control class " placeholder="" value={{$data->input}}>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Annual Amount Consumed<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="input_total_amount" id="input_total_amount" class="form-control class " placeholder="" value={{$data->input_total_amount}}>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Unit<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="input_unit" id="input_unit">
                                            <option value=""></option>
                                            @foreach ($units as $unit)
                                            <option value={{$unit}} {{$data->input_unit == $unit ? 'selected': ''}}>{{$unit}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Name of Output Material<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="output" id="output" class="form-control class " placeholder="" value={{$data->output}}>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Annual Amount Produced<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="output_total_amount" id="output_total_amount" class="form-control class " placeholder="" value={{$data->output_total_amount}}>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Unit<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="output_unit" id="output_unit">
                                            <option value=""></option>
                                            @foreach ($units as $unit)
                                            <option value={{$unit}} {{$data->output_unit == $unit ? 'selected': ''}}>{{$unit}}</option>
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
