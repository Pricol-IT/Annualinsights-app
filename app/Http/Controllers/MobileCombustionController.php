<?php

namespace App\Http\Controllers;

use App\Models\MobileCombustion;
use App\Models\Union;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MobileCombustionController extends Controller
{
    public function index(Request $request)
    {
        $uniqueYears = Union::distinct()->orderBy('year', "asc")->pluck('year');
        $uniqueLocations = Union::groupBy('loction')->pluck('loction');
        $monthsArray = [];
        for ($month = 1; $month <= 12; $month++) {
            $firstDayOfMonth = Carbon::create(null, $month, 1, 0, 0, 0);
            $monthsArray[] = $firstDayOfMonth->format('F');
        }

        // return $uniqueBenefits[0];
        $query = MobileCombustion::orderBy('id', "asc");

        if ($request->has('year') && $request->year != '') {
            $query->where('year', $request->year);
        }
        if ($request->has('loction') && $request->loction != '') {
            $query->where('loction', $request->loction);
        }
        if ($request->has('month') && $request->month != '') {
            $query->where('month', $request->month);
        }
        if (!$request->has('year') && !$request->has('loction')) {
            $query->latest()->limit(12);
        }
        $datas = $query->get();
        // return $data;

        return view('user.mobile_combustion.index', compact('datas', 'uniqueYears', 'uniqueLocations', 'monthsArray'));
    }

    public function create(Request $request)
    {
        $data = $request;
        $vehicletypes = [
            'Company Bus',
            'Company Car',
            'Company Bike',
            'Forklifts and non-road equipment',
            'Internal Transport vehicles',
            'Construction equipment',
            'Trucks',
            'Other'
        ];
        $fueltypes = ['Diesel', 'CNG', 'Petrol'];
        $units = ['Litres', 'Kg'];
        // return $data;
        return view('user.mobile_combustion.create', compact('data', 'vehicletypes', 'fueltypes', 'units'));
    }


    public function store(Request $request)
    {

        $data = [
            'year' => $request->year,
            'loction' => $request->loction,
            'month' => $request->month,
            'vehicletype' => $request->vehicletype,
            'vehicletype_other' => $request->vehicletype_other,
            'fueltype' => $request->fueltype,
            'unit' => $request->unit,
            'fuelconsumed' => $request->fuelconsumed,
            'Total_distance' => $request->Total_distance,
        ];
        $test = MobileCombustion::create($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('mobile_combustion.index', ['year' => $request->year, 'loction' => $request->loction, 'month' => $request->month,]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }



    }

    public function edit(string $id)
    {
        $vehicletypes = [
            'Company Bus',
            'Company Car',
            'Company Bike',
            'Forklifts and non-road equipment',
            'Internal Transport vehicles',
            'Construction equipment',
            'Trucks',
            'Other'
        ];
        $fueltypes = ['Diesel', 'CNG', 'Petrol'];
        $units = ['Litres', 'Kg'];
        $data = MobileCombustion::find($id);
        return view('user.mobile_combustion.edit', compact('data', 'vehicletypes', 'fueltypes', 'units'));
    }
    public function update(Request $request, $id)
    {

        $data = [
            'year' => $request->year,
            'loction' => $request->loction,
            'month' => $request->month,
            'vehicletype' => $request->vehicletype,
            'vehicletype_other' => $request->vehicletype_other,
            'fueltype' => $request->fueltype,
            'unit' => $request->unit,
            'fuelconsumed' => $request->fuelconsumed,
            'Total_distance' => $request->Total_distance,
        ];
        $test = MobileCombustion::where('id', $id)->update($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('mobile_combustion.index', ['year' => $request->year, 'loction' => $request->loction, 'month' => $request->month,]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }



    }
}
