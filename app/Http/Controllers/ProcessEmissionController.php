<?php

namespace App\Http\Controllers;

use App\Models\ProcessEmission;
use App\Models\Union;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProcessEmissionController extends Controller
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
        $query = ProcessEmission::orderBy('id', "asc");

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

        return view('user.process_emission.index', compact('datas', 'uniqueYears', 'uniqueLocations', 'monthsArray'));
    }

    public function create(Request $request)
    {
        $data = $request;
        $processtypes  = [
            'Sintering',
            'Die casting',
            'CNC',
            'Milling',
            'Turning',
            'Wire cutting',
            'Soldering',
            'Plastic injection moduling',
            'Other'
        ];

        $units = ['Litres', 'Kg'];
        // return $data;
        return view('user.process_emission.create', compact('data', 'processtypes', 'units'));
    }


    public function store(Request $request)
    {
        if($request->process=='update'){
        $data = [
            'year' => $request->year,
            'loction' => $request->loction,
            'month' => $request->month,
            'processtype' => $request->processtype,
            'processtype_other' => $request->processtype_other,
            'input' => $request->input,
            'input_total_amount' => $request->input_total_amount,
            'input_unit' => $request->input_unit,
            'output' => $request->output,
            'output_total_amount' => $request->output_total_amount,
            'output_unit' => $request->output_unit,
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
        $test = ProcessEmission::create($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('process_emission.index', ['year' => $request->year, 'loction' => $request->loction, 'month' => $request->month,]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }



    }

    public function edit(string $id)
    {
        $processtypes  = [
            'Sintering',
            'Die casting',
            'CNC',
            'Milling',
            'Turning',
            'Wire cutting',
            'Soldering',
            'Plastic injection moduling',
            'Other'
        ];
        $units = ['Litres', 'Kg'];
        $data = ProcessEmission::find($id);
        return view('user.process_emission.edit', compact('data', 'processtypes',  'units'));
    }
    public function update(Request $request, $id)
    {
        if($request->process=='update'){
        $data = [
            'year' => $request->year,
            'loction' => $request->loction,
            'month' => $request->month,
            'processtype' => $request->processtype,
            'processtype_other' => $request->processtype_other,
            'input' => $request->input,
            'input_total_amount' => $request->input_total_amount,
            'input_unit' => $request->input_unit,
            'output' => $request->output,
            'output_total_amount' => $request->output_total_amount,
            'output_unit' => $request->output_unit,
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
        $test = ProcessEmission::where('id', $id)->update($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('process_emission.index', ['year' => $request->year, 'loction' => $request->loction, 'month' => $request->month,]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }



    }
}
