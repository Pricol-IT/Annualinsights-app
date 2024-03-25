<?php

namespace App\Http\Controllers;

use App\Models\Union;
use App\Models\WaterManagement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WaterManagementController extends Controller
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
        $query = WaterManagement::orderBy('id', "asc");

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

        return view('user.water_management.index', compact('datas', 'uniqueYears', 'uniqueLocations', 'monthsArray'));
    }

    public function create(Request $request)
    {
        $data = $request;
        $watersources = [
            'Surface water (well, lake, pond, river by own)',
            'Ground water',
            'Third party watersupply',
            'Rainwater',
            'Treated wastewater from STP/ETP',
            'Municipality supply',
            'Others'
        ];
        $conservation_methods = [
            'Recycled',
            'Reused',
            'Rainwater harvested',
            'Others'
        ];
        $disposal_methods = [
            'into surfacewater',
            'into groundwater',
            'into seawater',
            'Others'
        ];
        $units = ['Litres', 'Kg'];
        // return $data;
        return view('user.water_management.create', compact('data', 'watersources', 'conservation_methods','disposal_methods', 'units'));
    }


    public function store(Request $request)
    {

        // return $request;
        $data = [
            'year' => $request->year,
            'loction' => $request->loction,
            'month' => $request->month,
            'watersource' => implode(", ",$request->watersource),
            'watersource_other' => $request->watersource_other,
            'watergenerated' => implode(", ",$request->watergenerated),
            'watergenerated_unit' => $request->watergenerated_unit,
            'totalwatergenerated'=>$request->totalwatergenerated,
            'wastegenerated' => $request->wastegenerated,
            'wastegenerated_unit' => $request->wastegenerated_unit,
            'conservation_method' => $request->conservation_method,
            'conservation_other' => $request->conservation_other,
            'conserved' => $request->conserved,
            'conserved_unit' => $request->conserved_unit,
            'disposal_method' => $request->disposal_method,
            'disposal_other' => $request->disposal_other,
            'discharged' => $request->discharged,
            'discharged_unit' => $request->discharged_unit,
        ];

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
        // return $data;
        $test = WaterManagement::create($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('water_management.index', ['year' => $request->year, 'loction' => $request->loction, 'month' => $request->month,]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }



    }

    public function edit(string $id)
    {
        $watersources = [
            'Surface water (well, lake, pond, river by own)',
            'Ground water',
            'Third party watersupply',
            'Rainwater',
            'Treated wastewater from STP/ETP',
            'Municipality supply',
            'Others'
        ];
        $conservation_methods = [
            'Recycled',
            'Reused',
            'Rainwater harvested',
            'Others'
        ];
        $disposal_methods = [
            'into surfacewater',
            'into groundwater',
            'into seawater',
            'Others'
        ];
        $units = ['Litres', 'Kg'];
        $data = WaterManagement::find($id);
        return view('user.water_management.edit', compact('data', 'watersources', 'conservation_methods','disposal_methods', 'units'));
    }
    public function update(Request $request, $id)
    {

        $data = [
            'year' => $request->year,
            'loction' => $request->loction,
            'month' => $request->month,
            'watersource' => implode(", ",$request->watersource),
            // 'watersource_other' => $request->watersource_other,
            'watergenerated' => implode(", ",$request->watergenerated),
            'totalwatergenerated'=>$request->totalwatergenerated,
            // 'watergenerated_unit' => $request->watergenerated_unit,
            'wastegenerated' => $request->wastegenerated,
            // 'wastegenerated_unit' => $request->wastegenerated_unit,
            // 'conservation_method' => $request->conservation_method,
            // 'conservation_other' => $request->conservation_other,
            'conserved' => $request->conserved,
            // 'conserved_unit' => $request->conserved_unit,
            // 'disposal_method' => $request->disposal_method,
            'disposal_other' => $request->disposal_other,
            'discharged' => $request->discharged,
            // 'discharged_unit' => $request->discharged_unit,
        ];

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

        $test = WaterManagement::where('id', $id)->update($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('water_management.index', ['year' => $request->year, 'loction' => $request->loction, 'month' => $request->month,]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }
    }
}
