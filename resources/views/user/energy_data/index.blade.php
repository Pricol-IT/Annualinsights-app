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
            <div class="col-lg-6">
                <div class="card p-3">
                    <canvas id="myChartpie" style="margin-left: auto;
                    margin-right: auto;"></canvas>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card p-3">
                    <canvas id="myChartyear"></canvas>
                </div>
            </div>
        </div>
        <h3>Plant electricity consumption in kWh</h3>
        <div class=" card">
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
                                <option value="{{$year}}" {{ request('year')== $year ? 'selected' : ''}}>{{$year}}</option>
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
            @php
            $power_from_diesel_generators = 0;
            $power_purchase_agreement = 0;
            $captive_power = 0;
            $electricity = 0;
            @endphp

            <div class="card-body table-responsive">
                <table class=" table ">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Generation from Diesel Generators</th>
                            <th>Grid Electricity</th>
                            <th>Power Purchase Agreement</th>
                            <th>Captive Power generation</th>
                            {{-- <th>Total Renewable Energy in kWh</th>
                            <th>Renewable Energy %</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($data as $data)
                        <tr>
                            <td>{{$data->month}}</td>
                            <td>{{$data->power_from_diesel_generators}}</td>
                            <td>{{$data->electricity}}</td>
                            <td>{{$data->power_purchase_agreement}}</td>
                            <td>{{$data->captive_power}}</td>
                            {{-- <td>#</td>
                            <td>#</td> --}}
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('energy_data.edit', $data->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                </div>
                            </td>
                        </tr>
                        @php
                        $power_from_diesel_generators += $data->power_from_diesel_generators;
                        $power_purchase_agreement += $data->power_purchase_agreement;
                        $captive_power += $data->captive_power;
                        $electricity += $data->electricity;
                        @endphp
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">record not found</td>
                        </tr>
                        @endforelse
                        <tr>
                            <td class="fw-bold">Sub-Total</td>
                            <td class="fw-bold">{{$power_from_diesel_generators}}</td>
                            <td class="fw-bold">{{$electricity}}</td>
                            <td class="fw-bold">{{$power_purchase_agreement}}</td>
                            <td class="fw-bold">{{$captive_power}}</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>

    </div>

</main><!-- End #main -->
@endsection
@section('script')
<script>
    var dg = {{$currentyeartotal->dg}};
    var ecity = {{$currentyeartotal->ecity}};
    var ppa = {{$currentyeartotal->ppa}};
    var cap = {{$currentyeartotal->cap}};
    
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar'
        , data: {
            labels: ['Generation from Diesel Generators', 'Grid Electricity', 'Power Purchase Agreement', 'Captive Power generation']
            , datasets: [{
                axis: 'y'
                , label: 'Power source'
                , data: [dg, ecity, ppa, cap]
                , fill: false
                , backgroundColor: [
                    'rgba(208, 5, 11, 0.8)'
                    , 'rgba(255, 159, 64, 0.8)'
                    , 'rgba(255, 205, 86, 0.9)'
                    , 'rgba(39, 161, 13, 1)'
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
        }
        , options: {
            indexAxis: 'y',
            plugins: {
                legend:{
                    display: false
                }
            }
        , }


    });


    const pie = document.getElementById('myChartpie');

    new Chart(pie, {
        type: 'doughnut'
        , data: {
            labels: [
                'Renewable Energy'
                , 'Non-Renewable Energy'
            , ]
            , datasets: [{
                label: 'My First Dataset'
                , data: ['{{$RE_percentage}}', (100-('{{$RE_percentage}}'))]
                , backgroundColor: [
                    'rgb(255, 99, 132)'
                    , 'rgb(54, 162, 235)'
                , ]
                , hoverOffset: 4
            }]
        }
        , options: {
            responsive: true
        , }
    });

    const yearbar = document.getElementById('myChartyear');
    new Chart(yearbar, {
        type: 'bar'
        , data: {
            labels: [@foreach ($threeyeartotal as $three)
                        '{{$three->year}}',
                    @endforeach]
            , datasets: [{
                label: 'My First Dataset'
                , data: [
                    @foreach ($threeyeartotal as $three)
                        '{{$three->total}}',
                    @endforeach
                ]
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
        }
        , options: {
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    , });

</script>
@endsection
