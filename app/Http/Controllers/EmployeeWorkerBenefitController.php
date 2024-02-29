<?php

namespace App\Http\Controllers;

use App\Models\EmployeeWorkerBenefit;
use Illuminate\Http\Request;

class EmployeeWorkerBenefitController extends Controller
{
    public function employee_index( Request $request)
    {
        $query = EmployeeWorkerBenefit::orderBy('id',"asc");

        if($request->has('year')  && $request->year != '')
        {
            $query->where('year', $request->year);
        }
        if($request->has('loction')  && $request->loction != '')
        {
            $query->where('loction', $request->loction);
        }
        if($request->has('benefits')  && $request->benefits != '')
        {
            $query->where('benefits', $request->benefits);
        }
        if(!$request->has('year')  && !$request->has('loction') && !$request->has('benefits'))
        {
            $query->where('benefits', 'Health_Insurance')->latest()->limit(12);
        }
        $datas = $query->get();
        // return $data;
        $uniqueYears = EmployeeWorkerBenefit::distinct()->orderBy('year',"asc")->pluck('year');
        $uniqueLocations = EmployeeWorkerBenefit::groupBy('loction')->pluck('loction');
        $uniqueBenefits = EmployeeWorkerBenefit::distinct()->pluck('benefits');
        // print($uniqueYears);
        // print($uniqueLocations);
        // return($uniqueBenefits);

        return view('user.employee_worker_benefits.employee_count.index',compact('datas','uniqueYears','uniqueLocations','uniqueBenefits'));
    }



    public function employee_edit(string $id){
        $data=EmployeeWorkerBenefit::find($id);
        return view('user.employee_worker_benefits.employee_count.edit',compact('data'));
    }
    public function employee_update(Request $request, $id){

        $data =[
            'year'=>$request->year,
            'loction'=>$request->loction,
            'month'=>$request->month,
            'pe_male'=>$request->pe_male,
            'pe_female'=>$request->pe_female,
            'pe_remark'=>$request->pe_remark,
            'te_male'=>$request->te_male,
            'te_female'=>$request->te_female,
            'te_remark'=>$request->te_remark,
        ];
        $test=EmployeeWorkerBenefit::where('id',$id)->update($data);
        if ($test){
            toastr()->success('added sucessfully');
            return redirect()->route('employee_worker_benefits.employeecount.index',['year'=>$request->year,'loction'=>$request->loction,'benefits'=>$request->benefits]);
        } else{
            toastr()->error('someting went worng');
            return back();
        }


    }

    public function worker_index( Request $request)
    {
        $query = EmployeeWorkerBenefit::orderBy('id',"asc");

        if($request->has('year')  && $request->year != '')
        {
            $query->where('year', $request->year);
        }
        if($request->has('loction')  && $request->loction != '')
        {
            $query->where('loction', $request->loction);
        }
        if($request->has('benefits')  && $request->benefits != '')
        {
            $query->where('benefits', $request->benefits);
        }
        if(!$request->has('year')  && !$request->has('loction'))
        {
            $query->where('benefits', 'Health_Insurance')->latest()->limit(12);
        }
        $datas = $query->get();
        $uniqueYears = EmployeeWorkerBenefit::distinct()->orderBy('year',"asc")->pluck('year');
        $uniqueLocations = EmployeeWorkerBenefit::orderBy('id',"asc")->distinct()->pluck('loction');
        $uniqueBenefits = EmployeeWorkerBenefit::orderBy('id',"asc")->distinct()->pluck('benefits');
        return view('user.employee_worker_benefits.worker_count.index',compact('datas','uniqueYears','uniqueLocations','uniqueBenefits'));
    }
    public function worker_edit(string $id){
        $data=EmployeeWorkerBenefit::find($id);
        return view('user.employee_worker_benefits.worker_count.edit',compact('data'));
    }

    public function worker_update(Request $request, $id){

        $data =[
            'year'=>$request->year,
            'loction'=>$request->loction,
            'month'=>$request->month,
            'pw_male'=>$request->pw_male,
            'pw_female'=>$request->pw_female,
            'pw_remark'=>$request->pw_remark,
            'tw_male'=>$request->tw_male,
            'tw_female'=>$request->tw_female,
            'tw_remark'=>$request->tw_remark,
        ];
        $test=EmployeeWorkerBenefit::where('id',$id)->update($data);
        if ($test){
            toastr()->success('added sucessfully');
            return redirect()->route('employee_worker_benefits.workercount.index',['year'=>$request->year,'loction'=>$request->loction, 'benefits'=>$request->benefits]);
        } else{
            toastr()->error('someting went worng');
            return back();
        }

    }
}
