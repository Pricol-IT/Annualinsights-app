@extends('layout.app')
@section('title')
{{__('Create link')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('water_management.store')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Fill the
                            Waste Generated values</h4>
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
                                <div id="inputFieldsContainer">
                                    <div class="input-group">
                                        <div class="form-group">
                                            <div class=" row mt-3">
                                                <label class="col-sm-5 col-form-label">Type of Water Consumption<span class="form-label-required text-danger">*</span></label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name="watersource[]" id="watersource">
                                                        <option value=""></option>
                                                        @foreach ($watersources as $watersource)
                                                        <option value="{{$watersource}}">{{$watersource}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class=" row mt-3">
                                                <label class="col-sm-5 col-form-label">Water consumption in m³</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="watergenerated[]" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Remove button -->
                                        <div class="col-sm-1">
                                            <!-- This will be replaced by JavaScript -->
                                        </div>
                                    </div>
                                </div>

                                <div id="addFieldsBtn" class="btn btn-primary">Add Item</div>


                                {{-- <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">If Other
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="watersource_other" id="watersource_other" class="form-control class " placeholder="" >
                                    </div>
                                </div> --}}

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Total Water Consumption
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="totalwatergenerated" id="watergenerated" class="form-control class " placeholder="">
                                    </div>
                                </div>

                                {{-- <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Unit<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="watergenerated_unit" id="watergenerated_unit">
                                            <option value=" "></option>
                                            @foreach ($units as $unit)
                                            <option value={{$unit}}>{{$unit}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="form-group row mt-3">
                            <label class="col-sm-5 col-form-label">Total Wastewater  generated
                            </label>
                            <div class="col-sm-6">
                                <input type="number" name="wastegenerated" id="wastegenerated" class="form-control class " placeholder="">
                            </div>
                        </div>

                        {{-- <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Unit<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="wastegenerated_unit" id="wastegenerated_unit">
                                            <option value=" "></option>
                                            @foreach ($units as $unit)
                                            <option value={{$unit}}>{{$unit}}</option>
                        @endforeach
                        </select>
                    </div>
                </div> --}}

                {{-- <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        conservation method Type<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="conservation_method" id="conservation_method">
                                            <option value=" "></option>
                                            @foreach ($conservation_methods as $conservation_method)
                                            <option value={{$conservation_method}}>{{$conservation_method}}</option>
                @endforeach
                </select>
        </div>
    </div> --}}

    {{-- <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">If Other
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="conservation_other" id="conservation_other" class="form-control class " placeholder="" >
                                    </div>
                                </div> --}}

    <div class="form-group row mt-3">
        <label class="col-sm-5 col-form-label">Total Wastewater Recycled​
        </label>
        <div class="col-sm-6">
            <input type="number" name="conserved" id="conserved" class="form-control class " placeholder="">
        </div>
    </div>

    {{-- <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Unit<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="conserved_unit" id="conserved_unit">
                                            <option value=" "></option>
                                            @foreach ($units as $unit)
                                            <option value={{$unit}}>{{$unit}}</option>
    @endforeach
    </select>
    </div>
    </div> --}}

    {{-- <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        disposal method Type<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="disposal_method" id="disposal_method">
                                            <option value=" "></option>
                                            @foreach ($disposal_methods as $disposal_method)
                                            <option value={{$disposal_method}}>{{$disposal_method}}</option>
    @endforeach
    </select>
    </div>
    </div>

    <div class="form-group row mt-3">
        <label class="col-sm-5 col-form-label">If Other
        </label>
        <div class="col-sm-6">
            <input type="text" name="disposal_other" id="disposal_other" class="form-control class " placeholder="">
        </div>
    </div> --}}

    <div class="form-group row mt-3">
        <label class="col-sm-5 col-form-label">Total Wastewater Discharged​
        </label>
        <div class="col-sm-6">
            <input type="number" name="discharged" id="discharged" class="form-control class " placeholder="">
        </div>
    </div>


    <div class="form-group row mt-3">
        <label class="col-sm-5 col-form-label">Total Rainwater Harvested​
        </label>
        <div class="col-sm-6">
            <input type="number" name="disposal_other" id="disposal_other" class="form-control class " placeholder="">
        </div>
    </div>

    {{-- <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Unit<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="discharged_unit" id="discharged_unit">
                                            <option value=" "></option>
                                            @foreach ($units as $unit)
                                            <option value={{$unit}}>{{$unit}}</option>
    @endforeach
    </select>
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
@section('script')
<script>
    document.getElementById('addFieldsBtn').addEventListener('click', function() {
        var container = document.getElementById('inputFieldsContainer');
        var clonedNode = container.firstElementChild.cloneNode(true);

        // Check if it's a cloned node
        if (container.children.length >= 1) {
            var removeBtn = document.createElement('div');
            removeBtn.classList.add('btn', 'btn-danger', 'removeBtn');
            removeBtn.textContent = 'Remove';
            clonedNode.querySelector('.col-sm-1').appendChild(removeBtn);
        }

        container.appendChild(clonedNode);
    });

    // Event delegation to handle remove button click
    document.getElementById('inputFieldsContainer').addEventListener('click', function(event) {
        if (event.target.classList.contains('removeBtn')) {
            event.target.closest('.input-group').remove();
        }
    });

</script>
@endsection
