@extends('layout.app')
@section('title')
{{__('Home')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="container">
        {{-- <h3 class="fw-bold">Dashboard</h3>

        <div class="row">
            <div class="col-lg-6">
                <div class="card p-3">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card p-3">
                    <canvas id="myChartyear"></canvas>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card p-3">
                    <canvas id="myChartpie" style="margin-left: auto;
                    margin-right: auto;"></canvas>
                </div>
            </div>

        </div> --}}
        <h3 class="fw-bold">Workers Count</h3>
        <div class=" card">
            @csrf
            <div class="card-header">
                <form id="formSubmit" action="{{route('workercount.index')}}" method="GET" onchange="this.submit();">
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
            {{-- @php
            $power_from_diesel_generators = 0;
            $power_purchase_agreement = 0;
            $captive_power = 0;
            $electricity = 0;
            @endphp --}}

            <div class="card-body table-responsive">
                <table class=" table ">
                    <thead>
                        <tr>
                            <th rowspan="2">Month</th>
                            <th colspan="3" style="text-align: center;">Permanent </th>
                            <th colspan="3" style="text-align: center;">Temporary </th>
                            {{-- <th rowspan="2">Status</th> --}}
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Third Gender</th>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Third Gender</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($datas as $data)

                        <tr>
                            <td>{{$data->month}}</td>
                            <td>{{$data->pw_male}}</td>
                            <td>{{$data->pw_female}}</td>
                            <td>{{$data->pw_other}}</td>
                            <td>{{$data->tw_male}}</td>
                            <td>{{$data->tw_female}}</td>
                            <td>{{$data->tw_other}}</td>
                            {{--
                            @switch($data->status)
                            @case('submitted')
                            <td> <span class="badge bg-primary"> Submitted </span></td>
                            @break
                            @case('saved')
                            <td> <span class="badge bg-warning"> Draft </span></td>
                            @break
                            @case('approved')
                            <td> <span class="badge bg-success"> Approved </span></td>
                            @break
                            @case('rejected')
                            <td> <span class="badge bg-danger"> Rejected </span></td>
                            @break

                            @default
                            <td> <span class="badge bg-secondary"> Not Proceeded </span></td>
                            @endswitch --}}
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('workercount.edit', $data->id) }}" class="btn btn-sm btn-light">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{ route('workercount.edit', $data->id) }}" class="btn btn-sm btn-light">
                                    <i class="bi bi-check2"></i>
                                    </a>
                                    <a href="{{ route('workercount.edit', $data->id) }}" class="btn btn-sm btn-light">
                                        <i class="bi bi-x-lg"></i>
                                    </a>

                                </div>
                            </td>
                        </tr>
                        {{-- @php
                        $power_from_diesel_generators += $data->power_from_diesel_generators;
                        $power_purchase_agreement += $data->power_purchase_agreement;
                        $captive_power += $data->captive_power;
                        $electricity += $data->electricity;
                        @endphp --}}
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">record not found</td>
                        </tr>
                        @endforelse
                        {{-- <tr>
                            <td class="fw-bold">Sub-Total</td>
                            <td class="fw-bold">{{round($power_from_diesel_generators)}}</td>
                        <td class="fw-bold">{{round($electricity)}}</td>
                        <td class="fw-bold">{{round($power_purchase_agreement)}}</td>
                        <td class="fw-bold">{{round($captive_power)}}</td>
                        </tr> --}}
                    </tbody>

                </table>
            </div>
        </div>

    </div>

</main><!-- End #main -->
@endsection
@section('script')
{{-- <script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar'
        , data: {
            labels: ['Generation from Diesel Generators', 'Grid Electricity', 'Power Purchase Agreement', 'Captive Power generation']
            , datasets: [{
                axis: 'y'
                , data: ['{{round($currentyeartotal->dg)}}', '{{round($currentyeartotal->ecity)}}', '{{round($currentyeartotal->ppa)}}', '{{round($currentyeartotal->cap)}}']
, fill: false
, backgroundColor: [
'rgba(39, 183, 245, 0.8)'
, 'rgba(208, 5, 11, 0.8)'
, 'rgba(255, 132, 3, 0.91)'
, 'rgba(45, 174, 0, 0.97)'
]
, borderColor: [
'rgb(31,146,196)'
, 'rgb(166,4,9)'
, 'rgb(232,120,3)'
, 'rgb(44,169,0)'
]
, borderWidth: 1
}]
}
, options: {
indexAxis: 'y'
, plugins: {
legend: {
display: false
}
, title: {
display: true
, text: 'Energy Consumption by Source'
}
}
, scales: {
x: {
grid: {
display: false
, }
}
, y: {
grid: {
display: false
, }
}
, }
}

});


const pie = document.getElementById('myChartpie');

new Chart(pie, {
type: 'doughnut'
, data: {
labels: [
'Renewable'
, 'Non-Renewable'
, ]
, datasets: [{
data: ['{{$RE_percentage}}', (100 - ('{{$RE_percentage}}'))]
, backgroundColor: [
'rgb(44,169,0)'
, 'rgb(247,1,1)'
, ]
, hoverOffset: 4
}]
}
, options: {
responsive: true
, plugins: {
title: {
display: true
, text: 'Energy Mix'
}
}
, }
});

const yearbar = document.getElementById('myChartyear');
new Chart(yearbar, {
type: 'bar'
, data: {
labels: [@foreach($threeyeartotal as $three)
'{{$three->year}}'
, @endforeach
]
, datasets: [{

data: [
@foreach($threeyeartotal as $three)
'{{round($three->total)}}'
, @endforeach
]
, backgroundColor: [
'rgba(208, 5, 11, 0.8)'
]
, borderColor: [
'rgb(166,4,9)'
]
, borderWidth: 1
}]
}
, options: {

plugins: {
title: {
display: true
, text: 'Energy Consumption Trend'
}
, legend: {
display: false
}
, }
, scales: {
x: {
grid: {
display: false
, }
}
, y: {
beginAtZero: false
, grid: {
display: false
, }
}
, }
}
, });

</script> --}}
@endsection
