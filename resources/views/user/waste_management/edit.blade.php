@extends('layout.app')
@section('title')
{{__('Create link')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('waste_management.update',$data->id)}}" method="POST">
                @csrf
                @method('patch')
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
                                            <div class="row mt-3">
                                                <label class="col-sm-5 col-form-label">
                                                    Waste Type<span class="form-label-required text-danger">*</span>
                                                </label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name="wastetype[]" id="wastetype">
                                                        <option value=" "></option>
                                                        @foreach ($wastetypes as $wastetype)
                                                        <option value={{$wastetype}}>{{$wastetype}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <label class="col-sm-5 col-form-label">Total Waste generated
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="number" name="generated[]" id="generated" class="form-control class " placeholder="">
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




                                <hr>

                                <div id="inputFieldsContainer2">

                                    <div class="input-group">
                                        <div class="form-group">
                                            <div class="row mt-3">
                                                <label class="col-sm-5 col-form-label">
                                                    Waste Disposal Type<span class="form-label-required text-danger">*</span>
                                                </label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name="disposaltype[]" id="disposaltype">
                                                        <option value=" "></option>
                                                        @foreach ($disposaltypes as $disposaltype)
                                                        <option value={{$disposaltype}}>{{$disposaltype}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <label class="col-sm-5 col-form-label">Total Waste Disposed
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="number" name="disposed[]" id="disposed" class="form-control class " placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Remove button -->
                                        <div class="col-sm-1">
                                            <!-- This will be replaced by JavaScript -->
                                        </div>
                                    </div>
                                </div>

                                <div id="addFieldsBtn2" class="btn btn-primary">Add Item</div>

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




    document.getElementById('addFieldsBtn2').addEventListener('click', function() {
        var container = document.getElementById('inputFieldsContainer2');
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
    document.getElementById('inputFieldsContainer2').addEventListener('click', function(event) {
        if (event.target.classList.contains('removeBtn')) {
            event.target.closest('.input-group').remove();
        }
    });

</script>
@endsection

