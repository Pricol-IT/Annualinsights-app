@extends('layout.app')
@section('title')
{{__('Home')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="container">
        <div class="card">
            {{-- <div class="card-header">
                <div class=" d-flex justify-content-between">
                    <h4 class="card-title p-0">All links</h4>
                    <div class="button">
                        <a href="#" class="btn btn-primary"><i class='bx bx-plus'></i>Create New Link</a>
                        <a href="#" class="btn btn-primary"></i>SlideShow</a>

                    </div>
                </div>
            </div> --}}



            <div class="card-body table-responsive p-0">
                <table class=" table datatable">
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Power from Diesel Generators in kWh</th>
                            <th>Electricity in kWh</th>
                            <th>Power Purchase Agreement in kWh</th>
                            <th>Captive Power (In-Plant Installations) in kWh</th>
                            <th>Total Units in kWh</th>
                            <th>Total Renewable Energy in kWh</th>
                            <th>Renewable Energy %</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($links as $link)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                        <td>{{$link->title}}</td>
                        <td><a href="{{$link->link_url}}">{{$link->link_url}}</a></td>
                        <td>{{ucfirst($link->status)}}</td>


                        <td>
                            <div class="d-flex gap-1">
                                <a href="#" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form method="post" action="#">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                        </tr>
                        @empty --}}
                        <tr>
                            <td colspan="4" class="text-center">record not found</td>
                        </tr>
                        {{-- @endforelse --}}

                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class=" d-flex justify-content-between">
                    <div class="form-group">
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
                    </div>
                    <div class="form-group">
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
                    </div>

                </div>
            </div>



            <div class="card-body table-responsive p-0">
                <table class=" table datatable">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Fuel for Diesel Generators</th>
                            <th>Power from Diesel Generators</th>
                            <th>Electricity</th>
                            <th>Power Purchase Agreement</th>
                            <th>Captive Power (In-Plant Installations)</th>
                            <th>Total Renewable Energy in kWh</th>
                            <th>Renewable Energy %</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($links as $link)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                        <td>{{$link->title}}</td>
                        <td><a href="{{$link->link_url}}">{{$link->link_url}}</a></td>
                        <td>{{ucfirst($link->status)}}</td>


                        <td>
                            <div class="d-flex gap-1">
                                <a href="#" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form method="post" action="#">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                        </tr>
                        @empty --}}
                        <tr>
                            <td colspan="4" class="text-center">record not found</td>
                        </tr>
                        {{-- @endforelse --}}

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</main><!-- End #main -->
@endsection
