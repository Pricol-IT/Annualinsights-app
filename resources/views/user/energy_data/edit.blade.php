@extends('layout.app')
@section('title')
{{__('Create link')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('links.update',$link->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Update Link</h4>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="offset-md-2">
                                    Enter the URL Details
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-12 p-2">
                                    <div class="row ">
                                        <div class="col-md-8 offset-md-2 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    URL Title
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="text" name="title" id="title" class="form-control class " value="{{$link->title}}" placeholder="Enter the URL Title">
                                                @if ($errors->has('title'))
                                                <span class="error text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    URL
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="url" name="link_url" id="link_url" class="form-control class " value="{{$link->link_url}}" placeholder="Enter the URL">
                                                @if ($errors->has('link_url'))
                                                <span class="error text-danger">{{ $errors->first('link_url') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Status
                                                    <span class="form-label-required text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value=""> Select status</option>
                                                    <option value="active" {{$link->status== 'active' ? 'selected' : ''}}>Active</option>
                                                    <option value="inactive" {{$link->status== 'inactive' ? 'selected' : ''}}>In-Active</option>
                                                </select>
                                                @if ($errors->has('status'))
                                                <span class="error text-danger">{{ $errors->first('status') }}</span>
                                                @endif
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
                        <a href="{{route('links.index')}}" class="btn btn-danger">Cancel</a>
                    </center>
                </div>
            </form>
        </div>
    </div>
</main><!-- End #main -->
@endsection
