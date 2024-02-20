@extends('layout.app')
@section('title')
{{__('Home')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="container">
        @csrf
        <h3>Dashboard</h3>

        <div class="row">
            <div class="col-lg-6">
                <div class="card p-3">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <h3>Plant Wise Report</h3>
        <div class="card">
            @csrf
            <div class="card-header">
                <form id="formSubmit" action="{{route('energy_data.index')}}" method="GET" onchange="this.submit();">
                    <div class=" d-flex justify-content-around">
                        <div class="form-group">
                            <label class="class mb-2" for="for">
                                Select Year:
                            </label>
                            <select class="form-control" name="year" id="year">
                                @foreach ($uniqueYears as $year)
                                <option value={{$year}} {{ request('year')== $year ? 'selected' : ''}}>{{$year}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label class="class mb-2" for="for">
                                Select Location:
                            </label>
                            <select class="form-control" name="loction" id="loction">
                                @foreach ($uniqueLocations as $location)
                                <option value={{$location}} {{ request('loction')== $location ? 'selected' : ''}}>{{$location}}</option>
                                @endforeach
                            </select>

                        </div>


                    </div>
                </form>
            </div>



            <div class="card-body table-responsive">
                <table class=" table ">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Power from Diesel Generators</th>
                            <th>Power Purchase Agreement</th>
                            <th>Captive Power</th>
                            <th>Electricity</th>
                            <th>Total Renewable Energy in kWh</th>
                            <th>Renewable Energy %</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($data as $data)
                        <tr>
                            <td>{{$data->month}}</td>
                            <td>{{$data->power_from_diesel_generators}}</td>
                            <td>{{$data->power_purchase_agreement}}</td>
                            <td>{{$data->captive_power}}</td>
                            <td>{{$data->electricity}}</td>
                            <td>#</td>
                            <td>#</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('energy_data.edit', $data->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">record not found</td>
                        </tr>
                        @endforelse

                    </tbody>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</main><!-- End #main -->
@endsection
@section('script')
<script>
    const ctx = document.getElementById('myChart');
    const data = {
        labels: ['Power from Diesel Generators', 'Power Purchase Agreement', 'Captive Power', 'Electricity']
        , datasets: [{
            axis: 'y'
            , label: false
            , data: [650000, 590000, 800000, 810000, 560000, 550000, 400000]
            , fill: false
            , backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
                , 'rgba(255, 159, 64, 0.2)'
                , 'rgba(255, 205, 86, 0.2)'
                , 'rgba(75, 192, 192, 0.2)'
                , 'rgba(54, 162, 235, 0.2)'
                , 'rgba(153, 102, 255, 0.2)'
                , 'rgba(201, 203, 207, 0.2)'
            ]
            , borderColor: [
                'rgb(255, 99, 132)'
                , 'rgb(255, 159, 64)'
                , 'rgb(255, 205, 86)'
                , 'rgb(75, 192, 192)'
                , 'rgb(54, 162, 235)'
                , 'rgb(153, 102, 255)'
                , 'rgb(201, 203, 207)'
            ]
            , borderWidth: 1
        }]
    };
    new Chart(ctx, {
        type: 'bar'
        , data
        , options: {
            indexAxis: 'y'
        , }


    });

</script>
@endsection
