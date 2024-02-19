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
                        <h4 class="card-title p-0">Commute form</h4>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="">
                                    <b class="fw_bold">Note:</b>
                                    <p>If mode of travel is multiple (e.g. employee will travel 2kms by bike & travel 10kms to office by bus, then select mixed mode in mode of travel & enter the details in comment like 4kms by bike (petrol) & 20kms by (Company or Govt.) bus (fuel type)</p>
                                    <p>For any queries, write to dhanasekar.vijayaramamoorthy@pricol.com</p>
                                    <p>Click on the row heading for better guidance</p>
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-12 p-2">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Employee Type
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <select class="form-control" name="modeoftravel" id="modeoftravel">
                                                    <option value=""> Select Type</option>
                                                    <option value="Staff">Staff</option>
                                                    <option value="Operator">Operator</option>
                                                    <option value="Trainee">Trainee</option>
                                                    <option value="Contract Labor">Contract Labor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Distance between Stay to Office & Office to Stay in Kms <span class="form-label-required text-danger">*</span>
                                                </label>

                                                <input type="text" name="fuel_for_diesel_generators" id="fuel_for_diesel_generators" class="form-control class" value="" placeholder="Enter in Kms">

                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    No. of Trips /day
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="power_from_diesel_generators" id="power_from_diesel_generators" class="form-control class " value="" placeholder="Enter in number">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Daily Travel in Kms
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="electricity" id="electricity" class="form-control class " value="" placeholder="Enter in kms">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Mode of Travel
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <select class="form-control" name="modeoftravel" id="modeoftravel">
                                                    <option value=""> Select Mode of Travel</option>
                                                    <option value="Car">Car</option>
                                                    <option value="Bike">Bike</option>
                                                    <option value="Company Bus">Company Bus</option>
                                                    <option value="Public Bus">Public Bus</option>
                                                    <option value="Auto">Auto</option>
                                                    <option value="Bicycle">Bicycle</option>
                                                    <option value="By Walk">By Walk</option>
                                                    <option value="Train">Train</option>
                                                    <option value="Mixed Mode">Mixed Mode</option>
                                                    <option value="Others">Others</option>
                                                </select></div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Vehicle No.
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="captive_power" id="captive_power" class="form-control class " value="" placeholder="Enter the number">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Type of Travel
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <select class="form-control" name="modeoftravel" id="modeoftravel">
                                                    <option value=""> Select Type of Travel</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Doubles">Doubles</option>
                                                    <option value="Employee Pool">Employee Pool</option>
                                                    <option value="With Public">With Public</option>
                                                </select></div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Pool Team Emp. ID
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="captive_power" id="captive_power" class="form-control class " value="" placeholder="enter the empoyee id">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Fuel Used
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <select class="form-control" name="modeoftravel" id="modeoftravel">
                                                    <option value=""> Select Fuel Type</option>
                                                    <option value="Petrol">Petrol</option>
                                                    <option value="Diesel">Diesel</option>
                                                    <option value="Bio-Diesel">Bio-Diesel</option>
                                                    <option value="CNG">CNG</option>
                                                    <option value="LPG">LPG </option>
                                                    <option value="Ethanol or Methanol">Ethanol or Methanol</option>
                                                    <option value="Electrical">Electrical</option>
                                                    <option value="None">None</option>
                                                </select></div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Weekly Work Pattern (in days)
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <select class="form-control" name="modeoftravel" id="modeoftravel">
                                                    <option value=""> Select Fuel Type</option>
                                                    <option value="6">6</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">Comments
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="captive_power" id="captive_power" class="form-control class " value="" placeholder="enter your comments">
                                            </div>
                                        </div>
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
            {{-- <a href="#" class="btn btn-danger">Cancel</a> --}}
        </center>
    </div>
    </form>
    </div>
    </div>
</main><!-- End #main -->
@endsection
