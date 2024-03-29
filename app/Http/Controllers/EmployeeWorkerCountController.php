<?php

namespace App\Http\Controllers;

use App\Models\EmployeeWorkerCount;
use Illuminate\Http\Request;

class EmployeeWorkerCountController extends Controller
{
    public function employee_index(Request $request)
    {
        $query = EmployeeWorkerCount::orderBy('id', "asc");

        if ($request->has('year') && $request->year != '') {
            $query->where('year', $request->year);
        }
        if ($request->has('loction') && $request->loction != '') {
            $query->where('loction', $request->loction);
        }
        if (!$request->has('year') && !$request->has('loction')) {
            $query->latest()->limit(12);
        }
        $datas = $query->get();
        // return $data;
        $uniqueYears = EmployeeWorkerCount::orderBy('year', "asc")->groupBy('year')->pluck('year');
        $uniqueLocations = EmployeeWorkerCount::groupBy('loction')->pluck('loction');
        return view('user.employee_worker_count.employee_count.index', compact('datas', 'uniqueYears', 'uniqueLocations'));
    }



    public function employee_edit(string $id)
    {
        $data = EmployeeWorkerCount::find($id);
        return view('user.employee_worker_count.employee_count.edit', compact('data'));
    }
    public function employee_update(Request $request, $id)
    {
        // return $request;
        if($request->process=='update'){

        $data = [
            'year' => $request->year,
            'loction' => $request->loction,
            'month' => $request->month,
            'pe_male' => $request->pe_male,
            'pe_female' => $request->pe_female,
            'pe_other' => $request->pe_other,
            'te_male' => $request->te_male,
            'te_female' => $request->te_female,
            'te_other' => $request->te_other
        ];
    }
        switch ($request->submit) {
            case ('Save'):
                $data['employee_status'] = 'saved';
                break;
            case ('Send for Approval'):
                $data['employee_status'] = 'submitted';
                break;
            case ('approved'):
                $data['employee_status'] = 'approved';
                break;
            case ('rejected'):
                $data['employee_status'] = 'rejected';
                break;
            default:
                $data['employee_status'] = 'not proceeded';
                break;
        }
        // return $data;
        $test = EmployeeWorkerCount::where('id', $id)->update($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('employeecount.index', ['year' => $request->year, 'loction' => $request->loction]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }


    }

    public function worker_index(Request $request)
    {
        $query = EmployeeWorkerCount::orderBy('id', "asc");

        if ($request->has('year') && $request->year != '') {
            $query->where('year', $request->year);
        }
        if ($request->has('loction') && $request->loction != '') {
            $query->where('loction', $request->loction);
        }
        if (!$request->has('year') && !$request->has('loction')) {
            $query->latest()->limit(12);
        }
        $datas = $query->get();
        $uniqueYears = EmployeeWorkerCount::distinct()->orderBy('year', "asc")->pluck('year');
        $uniqueLocations = EmployeeWorkerCount::groupBy('loction')->pluck('loction');
        return view('user.employee_worker_count.worker_count.index', compact('datas', 'uniqueYears', 'uniqueLocations'));
    }
    public function worker_edit(string $id)
    {
        $data = EmployeeWorkerCount::find($id);
        return view('user.employee_worker_count.worker_count.edit', compact('data'));
    }

    public function worker_update(Request $request, $id)
    {
// return $request;
if($request->process=='update'){
        $data = [
            'year' => $request->year,
            'loction' => $request->loction,
            'month' => $request->month,
            'pw_male' => $request->pw_male,
            'pw_female' => $request->pw_female,
            'pw_other' => $request->pw_other,
            'tw_male' => $request->tw_male,
            'tw_female' => $request->tw_female,
            'tw_other' => $request->tw_other,
        ];
    }
        switch ($request->submit) {
            case ('Save'):
                $data['worker_status'] = 'saved';
                break;
            case ('Send for Approval'):
                $data['worker_status'] = 'submitted';
                break;
            case ('approved'):
                $data['worker_status'] = 'approved';
                break;
            case ('rejected'):
                $data['worker_status'] = 'rejected';
                break;
            default:
                $data['worker_status'] = 'not proceeded';
                break;
        }
        $test = EmployeeWorkerCount::where('id', $id)->update($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('workercount.index', ['year' => $request->year, 'loction' => $request->loction]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }


    }
}
