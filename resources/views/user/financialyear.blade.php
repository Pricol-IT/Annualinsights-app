@extends('layout.app')
@section('title')
{{__('Create link')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('user.generateyear')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Generate Financial Year</h4>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="">
                                    Note: Enter the year in this format - 2023-24
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-12 p-2">
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    New Financial year
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="financialyear" id="financialyear" class="form-control class" value="" placeholder="eg.2023-24">

                                            </div>
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
                <input type="submit" class="btn btn-primary" value='Generate'>
                {{-- <a href="#" class="btn btn-danger">Cancel</a> --}}
            </center>
        </div>
        </form>
    </div>
    </div>
</main><!-- End #main -->
@endsection
