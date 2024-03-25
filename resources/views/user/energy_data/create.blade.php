@extends('layout.app')
@section('title')
{{__('Create link')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('energy_data.update',$data->id)}}" method="POST">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Fill Energy Data</h4>
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
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">
                                        Generation from Diesel Generators <span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="power_from_diesel_generators" id="power_from_diesel_generators" class="form-control class " value="{{$data->power_from_diesel_generators}}" placeholder="Enter in kWh">
                                    </div>
                                    <label class="col-sm-1 col-form-label">
                                        kWh
                                    </label>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Grid Electricity<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="electricity" id="electricity" class="form-control class " value="{{$data->electricity}}" placeholder="Enter in kWh">
                                    </div>
                                    <label class="col-sm-1 col-form-label">
                                        kWh
                                    </label>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Power Purchase Agreement<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="power_purchase_agreement" id="power_purchase_agreement" class="form-control class " value="{{$data->power_purchase_agreement}}" placeholder="Enter in kWh">
                                    </div><label class="col-sm-1 col-form-label">
                                        kWh
                                    </label>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Captive Power generation<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="captive_power" id="captive_power" class="form-control class " value="{{$data->captive_power}}" placeholder="Enter in kWh">
                                    </div><label class="col-sm-1 col-form-label">
                                        kWh
                                    </label>
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
