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
                            <div class="card-body row">
                                <div class="col-md-12 p-2">
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Fuel for Diesel Generators
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="fuel_for_diesel_generators" id="fuel_for_diesel_generators" class="form-control class" value="{{$data->fuel_for_diesel_generators}}" placeholder="Enter in Litres">

                                            </div>
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Power from Diesel Generators
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="power_from_diesel_generators" id="power_from_diesel_generators" class="form-control class " value="{{$data->power_from_diesel_generators}}" placeholder="Enter in kWh">
                                            </div>
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Electricity
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="electricity" id="electricity" class="form-control class " value="{{$data->electricity}}" placeholder="Enter in kWh">
                                            </div>
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Power Purchase Agreement
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="power_purchase_agreement" id="power_purchase_agreement" class="form-control class " value="{{$data->power_purchase_agreement}}" placeholder="Enter in kWh">
                                            </div>
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Captive Power (In-Plant Installations)
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="captive_power" id="captive_power" class="form-control class " value="{{$data->captive_power}}" placeholder="Enter in kWh">
                                            </div>

                                           
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div>
            <center>
                <input type="submit" class="btn btn-primary" value='Submit'>
                <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
            </center>
        </div>
        </form>
    </div>
    </div>
</main><!-- End #main -->
@endsection
