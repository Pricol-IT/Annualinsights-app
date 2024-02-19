@extends('layout.app')
@section('title')
{{__('Home')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="container">
        @csrf
        <h3> Overall Dashboard</h1>
            <div class="card">


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
            <h3>Plant Wise Report</h1>
                <div class="card">
                    <form action="{{ route('addmonth') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            {{-- <form id="formSubmit" action="{{route('energy_data.index')}}" method="GET" onchange="this.submit();"> --}}
                            <div class=" d-flex justify-content-around">
                                <div class="form-group">
                                    <label class="class mb-2" for="for">
                                        Year
                                        <span class="form-label-required text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="year" id="year">
                                        <option value="" {{ request('year')== '' ? 'selected' : ''}}> Select year</option>
                                        <option value="2022-23" {{ request('year')== '2022-23' ? 'selected' : ''}}>2022-23</option>
                                        <option value="2023-24" {{ request('year')== '2023-24' ? 'selected' : ''}}>2023-24</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label class="class mb-2" for="for">
                                        Location
                                        <span class="form-label-required text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="loction" id="loction">
                                        <option value="" {{ request('loction')== '' ? 'selected' : ''}}> Select location</option>
                                        <option value="Plant-1" {{ request('loction')== 'Plant-1' ? 'selected' : ''}}>Plant 1</option>
                                        <option value="Plant-2" {{ request('loction')== 'Plant-2' ? 'selected' : ''}}>Plant 2</option>
                                        <option value="Plant-3" {{ request('loction')== 'Plant-3' ? 'selected' : ''}}>Plant 3</option>
                                        <option value="Plant-5" {{ request('loction')== 'Plant-5' ? 'selected' : ''}}>Plant 5</option>
                                        <option value="Plant-7" {{ request('loction')== 'Plant-7' ? 'selected' : ''}}>Plant 7</option>
                                        <option value="Plant-9" {{ request('loction')== 'Plant-9' ? 'selected' : ''}}>Plant 9</option>
                                        <option value="Plant-10" {{ request('loction')== 'Plant-10' ? 'selected' : ''}}>Plant 10</option>
                                        <option value="Plant-12" {{ request('loction')== 'Plant-12' ? 'selected' : ''}}>Plant 12</option>
                                        <option value="Plant-Corporate" {{ request('location')== 'Plant-Corporate' ? 'selected' : ''}}>Plant Corporate</option>
                                    </select>

                                </div>


                            </div>
                            {{-- </form> --}}
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
                                    @php
                                    $month=['Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec','Jan', 'Feb', 'Mar']
                                    @endphp

                                    @foreach($month as $month)
                                    <tr>
                                        <td>{{$month}}
                                            <input type="hidden" name="month" value={{$month}}></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button type="submit" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil"></i>
                                                </button>

                                            </div>
                                        </td>
                                    </tr> @endforeach
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
                    </form>
                </div>

    </div>

</main><!-- End #main -->
@endsection
@section('script')
<script>
    document.getElementById('year').addEventListener('change', function() {
        var selectedYear = this.value;

        // Make an AJAX request to the Laravel route
        fetch('/generate-month?year=' + selectedYear)
            .then(response => response.json())
            .then(data => {
                // Assuming you have a variable to store the months in your JavaScript
                var months = data.months;
                console.log(months); // Output the months to console

                // You can now use the 'months' variable as needed
            });

        // Trigger a window refresh if needed
        // window.location.reload();
    });

</script>
@endsection
