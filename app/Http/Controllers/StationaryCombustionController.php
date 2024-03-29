<?php

namespace App\Http\Controllers;

use App\Models\StationaryCombustion;
use App\Models\Union;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StationaryCombustionController extends Controller
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
        $query = StationaryCombustion::orderBy('id', "asc");

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
        $total = DB::table('stationary_combustions')
            ->select('year', 'status', 'month')
            ->selectRaw('SUM(total_comsumption) as total')
            ->where('status', 'approved')
            ->groupBy('year', 'status', 'month')
            ->get();
        // return $total;
        return view('user.stationary_combustion.index', compact('datas', 'uniqueYears', 'uniqueLocations', 'monthsArray'));
    }

    public function create(Request $request)
    {
        $data = $request;
        $equipments = ['Boilers', 'Burners', 'Thermal oxidizers', 'Combustion turbines', 'Furnaces, including blast furnaces', 'Open burning (e.g., fireplaces)', 'Process heaters', 'Kilns', 'Flares', 'Incinerators', 'Ovens', 'Engines', 'Dryers', 'Any other equipment or machinery that combusts carbon bearing fuels or waste streams'];
        $fueltypes = ['Diesel', 'LPG', 'Petrol', 'Natural Gas', 'Propane', 'Fuel Oil', 'Kerosene', 'Coal', 'Other'];
        $units = ['Litres', 'Kg'];
        // return $data;
        return view('user.stationary_combustion.create', compact('data', 'equipments', 'fueltypes', 'units'));
    }


    public function store(Request $request)
    {
        if ($request->process == 'update') {
            $data = [
                'year' => $request->year,
                'loction' => $request->loction,
                'month' => $request->month,
                'equipment' => $request->equipment,
                'fueltype' => $request->fueltype,
                'fueltype_other' => $request->fueltype_other,
                'unit' => $request->unit,
                'total_comsumption' => $request->total_comsumption,
            ];
        }
        switch ($request->submit) {
            case ('Save'):
                $data['status'] = 'saved';
                break;
            case ('Send for Approval'):
                $data['status'] = 'submitted';
                break;
            case ('approved'):
                $data['status'] = 'approved';
                break;
            case ('rejected'):
                $data['status'] = 'rejected';
                break;
            default:
                $data['status'] = 'not proceeded';
                break;
        }
        $test = StationaryCombustion::create($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('stationary_combustion.index', ['year' => $request->year, 'loction' => $request->loction, 'month' => $request->month,]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }



    }

    public function edit(string $id)
    {
        $equipments = ['Boilers', 'Burners', 'Thermal oxidizers', 'Combustion turbines', 'Furnaces, including blast furnaces', 'Open burning (e.g., fireplaces)', 'Process heaters', 'Kilns', 'Flares', 'Incinerators', 'Ovens', 'Engines', 'Dryers', 'Any other equipment or machinery that combusts carbon bearing fuels or waste streams'];
        $fueltypes = ['Diesel', 'LPG', 'Petrol', 'Natural Gas', 'Propane', 'Fuel Oil', 'Kerosene', 'Coal', 'Other'];
        $units = ['Litres', 'Kg'];
        $data = StationaryCombustion::find($id);
        return view('user.stationary_combustion.edit', compact('data', 'equipments', 'fueltypes', 'units'));
    }
    public function update(Request $request, $id)
    {
        if ($request->process == 'update') {
            $data = [
                'year' => $request->year,
                'loction' => $request->loction,
                'month' => $request->month,
                'equipment' => $request->equipment,
                'fueltype' => $request->fueltype,
                'fueltype_other' => $request->fueltype_other,
                'unit' => $request->unit,
                'total_comsumption' => $request->total_comsumption,
            ];
        }
        switch ($request->submit) {
            case ('Save'):
                $data['status'] = 'saved';
                break;
            case ('Send for Approval'):
                $data['status'] = 'submitted';
                break;
            case ('approved'):
                $data['status'] = 'approved';
                break;
            case ('rejected'):
                $data['status'] = 'rejected';
                break;
            default:
                $data['status'] = 'not proceeded';
                break;
        }
        $test = StationaryCombustion::where('id', $id)->update($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('stationary_combustion.index', ['year' => $request->year, 'loction' => $request->loction, 'month' => $request->month,]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }



    }
}
