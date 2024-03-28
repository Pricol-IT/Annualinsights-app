@extends('layout.app')
@section('title')
{{__('Home')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="container">
        <h3 class="fw-bold">Dashboard</h3>

        <div class="row">
            <div class="col-lg-6">
                @livewire(\App\Livewire\StationaryCombustion\FuelsTypeChart::class)
            </div>
            <div class="col-lg-6">
                @livewire(\App\Livewire\StationaryCombustion\YearlyChart::class)
            </div>
            <div class="col-lg-6 mt-3">
                @livewire(\App\Livewire\StationaryCombustion\MonthlyChart::class)
            </div>

        </div>
        <h3 class="fw-bold">
            Stationary Combustion</h3>
        <div class=" card">
            @csrf
            <div class="card-header">
                <form id="formSubmit" action="{{route('stationary_combustion.index')}}" method="GET" onchange="this.submit();">
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
                            <th>Equipment</th>
                            <th>Fuel Type </th>
                            <th>Total Consumption </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>

                        @forelse($datas as $data)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->equipment}}</td>
                            <td>{{($data->fueltype != 'Other') ? $data->fueltype.' in '.$data->unit : $data->fueltype_other.' in '.$data->unit}}</td>
                            <td>{{$data->total_comsumption}}</td>


                            <form action="{{route('stationary_combustion.update',$data->id)}}" method="POST">
                                @csrf
                                @method('patch')

                                <input type="hidden" name="year" value="{{$data->year}}">
                                <input type="hidden" name="loction" value="{{$data->loction}}">
                                <input type="hidden" name="month" value="{{$data->month}}">

                                <input type="hidden" name="process" value="status">
                                <x-status.action-status :status="$data->status" :id="$data->id" :edit="'stationary_combustion.edit'" />

                            </form>
                            @empty
                        <tr>
                            <td colspan="9" class="text-center">record not found</td>
                        </tr>
                        @endforelse
                        <tr>
                            <form id="formSubmit" action="{{route('stationary_combustion.create')}}" method="POST">
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
