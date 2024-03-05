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
                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Waste Type<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="wastetype" id="wastetype">
                                            <option value=" "></option>
                                            @foreach ($wastetypes as $wastetype)
                                            <option value={{$wastetype}} {{$data->wastetype == $wastetype ? 'selected': ''}}>{{$wastetype}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">If Other
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="wastetypes_other" id="wastetypes_other" class="form-control class " placeholder="" value={{$data->wastetypes_other}} >
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Total Waste generated
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="generated" id="generated" class="form-control class " placeholder="" value={{$data->generated}}>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Unit<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="generated_unit" id="generated_unit">
                                            <option value=" "></option>
                                            @foreach ($units as $unit)
                                            <option value={{$unit}} {{$data->generated_unit == $unit ? 'selected': ''}}>{{$unit}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Waste Disposal Type<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="disposaltype" id="disposaltype">
                                            <option value=" "></option>
                                            @foreach ($disposaltypes as $disposaltype)
                                            <option value={{$disposaltype}} {{$data->disposaltype == $disposaltype ? 'selected': ''}}>{{$disposaltype}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Total Waste Disposed
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="disposed" id="disposed" class="form-control class " placeholder="" value={{$data->disposed}}>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Unit<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="disposed_unit" id="disposed_unit">
                                            <option value=" "></option>
                                            @foreach ($units as $unit)
                                            <option value={{$unit}} {{$data->disposed_unit == $unit ? 'selected': ''}}>{{$unit}}</option>
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
