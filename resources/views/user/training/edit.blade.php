@extends('layout.app')
@section('title')
{{__('Create link')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('training.update',$data->id)}}" method="POST">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Fill the
                            Training values</h4>
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
                                    <input type="hidden" name="process" value="update">

                                </div>
                            </div>

                            <div class="card-body p-4">
                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Attendee <span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="attendee" id="attendee">
                                            <option value=""></option>
                                            @foreach ($attendees as $attendee)
                                            <option value="{{$attendee}}" {{$data->attendee == $attendee ? 'selected': ''}}>{{$attendee}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">
                                        Training topic<span class="form-label-required text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="training_topic" id="training_topic">
                                            @foreach ($training_topics as $training_topic)
                                            <option value="{{$training_topic}}" {{$data->training_topic == $training_topic ? 'selected': ''}}>{{$training_topic}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>




                                <div class=" form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">No. of Trainings
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="no_of_training" id="no_of_training" class="form-control class " placeholder="" value="{{$data->no_of_training}}">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">No. of Participants
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="no_of_participants" id="no_of_participants" class="form-control class " placeholder="" value="{{$data->no_of_participants}}">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Total Training Man-days
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="total_days" id="total_days" class="form-control class " placeholder="" value="{{$data->total_days}}">
                                    </div>
                                </div>


                                <div class="form-group row mt-3">
                                    <label class="col-sm-5 col-form-label">Total No. of Personnel Covered
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" name="total_personnel_covered" id="total_personnel_covered" class="form-control class " placeholder="" value="{{$data->total_personnel_covered}}">
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
