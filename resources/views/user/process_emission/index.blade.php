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
        <h3 class="fw-bold">
            Process Emission</h3>
        <div class=" card">
            @csrf
            <div class="card-header">
                <form id="formSubmit" action="{{route('process_emission.index')}}" method="GET" onchange="this.submit();">
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
                                Select Month:
                            </label>
                            <select class="form-control" name="month" id="month">
                                @foreach ($monthsArray as $month)
                                <option value={{$month}} {{ request('month')== $month ? 'selected' : ''}}>{{$month}}</option>
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
                            <th>S.No.</th>
                            <th>Process type </th>
                            <th>Name of Input Material </th>
                            <th>Amount Consumed </th>
                            <th>Name of Output Material </th>
                            <th>Amount Consumed </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>

                        @forelse($datas as $data)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{($data->processtype != 'Other' ) ? $data->processtype : $data->processtype_other}}</td>
                            <td>{{$data->input}}</td>
                            <td>{{$data->input_total_amount.' in '.$data->input_unit}}</td>
                            <td>{{$data->output }}</td>
                            <td>{{$data->output_total_amount.' in '.$data->output_unit}}</td>
                            <x-status.action-status :status="$data->status" :id="$data->id" :edit="'process_emission.edit'"/>



                        @empty
                        <tr>
                            <td colspan="9" class="text-center">record not found</td>
                        </tr>
                        @endforelse
                        <tr>
                            <form id="formSubmit" action="{{route('process_emission.create')}}" method="POST">
                                @csrf
                                <input type="hidden" name="year" value="{{request('year') ? request('year') : ($uniqueYears[0] ? $uniqueYears[0] : '') }}">
                                <input type="hidden" name="loction" value="{{request('loction') ? request('loction') : ($uniqueLocations[0] ? $uniqueLocations[0] : '') }}">
                                <input type="hidden" name="month" value="{{request('month') ? request('month') : $monthsArray[0] }}">
                                <td colspan="9" class="text-center"><input class="btn btn-primary" type="submit" value="Add item"></td>
                            </form>
                        </tr>
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
