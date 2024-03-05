<?php

namespace App\Http\Controllers;

use App\Models\Union;
use App\Models\WasteManagement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WasteManagementController extends Controller
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
        $query = WasteManagement::orderBy('id', "asc");

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

        return view('user.waste_management.index', compact('datas', 'uniqueYears', 'uniqueLocations', 'monthsArray'));
    }

    public function create(Request $request)
    {
        $data = $request;
        $wastetypes = [
            'E-waste',
            'Plastic waste',
           ' Metal waste',
            'Glass waste',
            'Paper waste',
            'Batteries and accumulator waste',
            'Civil waste',
            'Food waste',
            'Aluminium waste',
            'Miscellaneous waste',
            'Equipment retrial waste',
            'Chemical container waste',
            'Polycarbonate opaque purge',
            'Used or spent oil',
            'Waste or Residue containing oil',
            'Spent Solvent',
            'Process waste or residue',
            'Oil & Grease Skimming waste',
            'Other'
        ];
        $disposaltypes = ['Recycled',
        'Reused',
        'Incinerated',
        'Waste to Energy',
        'Co-processing',
        'Composted',
        'Landfill',
        'Biogas Generation'];
        $units = ['Litres', 'Kg'];
        // return $data;
        return view('user.waste_management.create', compact('data', 'wastetypes', 'disposaltypes', 'units'));
    }


    public function store(Request $request)
    {

        $data = [
            'year' => $request->year,
            'loction' => $request->loction,
            'month' => $request->month,
            'wastetype' => $request->wastetype,
            'wastetype_other' => $request->wastetype_other,
            'generated' => $request->generated,
            'generated_unit' => $request->generated_unit,
            'disposaltype' => $request->disposaltype,
            'disposed' => $request->disposed,
            'disposed_unit' => $request->disposed_unit,
        ];
        // return $data;
        $test = WasteManagement::create($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('waste_management.index', ['year' => $request->year, 'loction' => $request->loction, 'month' => $request->month,]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }



    }

    public function edit(string $id)
    {
        $wastetypes = [
            'E-waste',
            'Plastic waste',
           ' Metal waste',
            'Glass waste',
            'Paper waste',
            'Batteries and accumulator waste',
            'Civil waste',
            'Food waste',
            'Aluminium waste',
            'Miscellaneous waste',
            'Equipment retrial waste',
            'Chemical container waste',
            'Polycarbonate opaque purge',
            'Used or spent oil',
            'Waste or Residue containing oil',
            'Spent Solvent',
            'Process waste or residue',
            'Oil & Grease Skimming waste',
            'Other'
        ];
        $disposaltypes = ['Recycled',
        'Reused',
        'Incinerated',
        'Waste to Energy',
        'Co-processing',
        'Composted',
        'Landfill',
        'Biogas Generation'];
        $units = ['Litres', 'Kg'];
        $data = WasteManagement::find($id);
        return view('user.waste_management.edit', compact('data', 'wastetypes', 'disposaltypes', 'units'));
    }
    public function update(Request $request, $id)
    {

        $data = [
            'year' => $request->year,
            'loction' => $request->loction,
            'month' => $request->month,
            'wastetype' => $request->wastetype,
            'wastetype_other' => $request->wastetype_other,
            'generated' => $request->generated,
            'generated_unit' => $request->generated_unit,
            'disposaltype' => $request->disposaltype,
            'disposed' => $request->disposed,
            'disposed_unit' => $request->disposed_unit,
        ];

        $test = WasteManagement::where('id', $id)->update($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('waste_management.index', ['year' => $request->year, 'loction' => $request->loction, 'month' => $request->month,]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }
    }
}
