<?php

namespace App\Http\Controllers;

use App\Models\FugitiveEmission;
use App\Models\Union;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FugitiveEmissionController extends Controller
{
    public function index(Request $request)
    {
        $uniqueYears = Union::distinct()->orderBy('year', "asc")->pluck('year');
        $uniqueLocations = Union::orderBy('id', "asc")->distinct()->pluck('loction');
        $monthsArray = [];
        for ($month = 1; $month <= 12; $month++) {
            $firstDayOfMonth = Carbon::create(null, $month, 1, 0, 0, 0);
            $monthsArray[] = $firstDayOfMonth->format('F');
        }

        // return $uniqueBenefits[0];
        $query = FugitiveEmission::orderBy('id', "asc");

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

        return view('user.fugitive_emission.index', compact('datas', 'uniqueYears', 'uniqueLocations', 'monthsArray'));
    }

    public function create(Request $request)
    {
        $data = $request;
        $activitytypes = [
            'Refrigerated transport',
            'Industrial process refrigeration',
            'Cold storage warehouses',
            'Fire suppression',
            'Mobile air conditioning'
        ];
        $gastypes = [
            'R22',
            'R410',
            'R134A',
            'R407c',
            'R32',
            'R23',
            'Oxygen',
            'Acetylene',
            'LPG',
            'R404A',
            'Nitrogen',
            'R410A',
            'Ammonia',
            'R404',
            'R134',
            'R401',
            'R407',
            'Other'
        ];
        $units = ['Litres', 'Kg'];
        // return $data;
        return view('user.fugitive_emission.create', compact('data', 'activitytypes', 'gastypes', 'units'));
    }


    public function store(Request $request)
    {

        $data = [
            'year' => $request->year,
            'loction' => $request->loction,
            'month' => $request->month,
            'activitytype' => $request->activitytype,
            'gastype' => $request->gastype,
            'gastype_other' => $request->gastype_other,
            'unit' => $request->unit,
            'Total_consumed' => $request->Total_consumed,
        ];
        $test = FugitiveEmission::create($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('fugitive_emission.index', ['year' => $request->year, 'loction' => $request->loction, 'month' => $request->month,]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }



    }

    public function edit(string $id)
    {
        $activitytypes = [
            'Refrigerated transport',
            'Industrial process refrigeration',
            'Cold storage warehouses',
            'Fire suppression',
            'Mobile air conditioning'
        ];
        $gastypes = [
            'R22',
            'R410',
            'R134A',
            'R407c',
            'R32',
            'R23',
            'Oxygen',
            'Acetylene',
            'LPG',
            'R404A',
            'Nitrogen',
            'R410A',
            'Ammonia',
            'R404',
            'R134',
            'R401',
            'R407',
            'Other'
        ];
        $units = ['Litres', 'Kg'];
        $data = FugitiveEmission::find($id);
        return view('user.fugitive_emission.edit', compact('data', 'activitytypes', 'gastypes', 'units'));
    }
    public function update(Request $request, $id)
    {

        $data = [
            'year' => $request->year,
            'loction' => $request->loction,
            'month' => $request->month,
            'activitytype' => $request->activitytype,
            'gastype' => $request->gastype,
            'gastype_other' => $request->gastype_other,
            'unit' => $request->unit,
            'Total_consumed' => $request->Total_consumed,
        ];
        $test = FugitiveEmission::where('id', $id)->update($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('fugitive_emission.index', ['year' => $request->year, 'loction' => $request->loction, 'month' => $request->month,]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }



    }
}
