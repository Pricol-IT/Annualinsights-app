@extends('layout.app')
@section('title')
{{__('Create link')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('energy_data.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
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
                                    <p>Financial year: {{$request->year}}</p>
                                    <input type="hidden" name="year" value={{$request->year}}>
                                    <p>Month: {{$request->month}}</p>
                                    <input type="hidden" name="month" value={{$request->month}}>
                                    <p>Location: {{$request->loction}}</p>
                                    <input type="hidden" name="loction" value={{$request->loction}}>
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
                                                <input type="text" name="fuel_for_diesel_generators" id="fuel_for_diesel_generators" class="form-control class" value="" placeholder="Enter in Litres">

                                            </div>
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Power from Diesel Generators
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="power_from_diesel_generators" id="power_from_diesel_generators" class="form-control class " value="" placeholder="Enter in kWh">
                                            </div>
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Electricity
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="electricity" id="electricity" class="form-control class " value="" placeholder="Enter in kWh">
                                            </div>
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Power Purchase Agreement
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="power_purchase_agreement" id="power_purchase_agreement" class="form-control class " value="" placeholder="Enter in kWh">
                                            </div>
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Captive Power (In-Plant Installations)
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="captive_power" id="captive_power" class="form-control class " value="" placeholder="Enter in kWh">
                                            </div>

                                            {{-- <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Status
                                                    <span class="form-label-required text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value=""> Select status</option>
                                                    <option value="active" {{old('status')== 'active' ? 'selected' : ''}}>Active</option>
                                            <option value="inactive" {{old('status')== 'inactive' ? 'selected' : ''}}>In-active</option>
                                            </select>
                                            @if ($errors->has('status'))
                                            <span class="error text-danger">{{ $errors->first('status') }}</span>
                                            @endif
                                        </div> --}}
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
                <a href="#" class="btn btn-danger">Cancel</a>
            </center>
        </div>
        </form>
    </div>
    </div>
</main><!-- End #main -->
@endsection
