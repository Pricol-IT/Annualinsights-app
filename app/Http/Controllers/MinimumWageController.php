<?php

namespace App\Http\Controllers;

use App\Models\MinimumWage;
use Illuminate\Http\Request;

class MinimumWageController extends Controller
{
    public function employee_index( Request $request)
    {
        $uniqueYears = MinimumWage::distinct()->orderBy('year',"asc")->pluck('year');
        $uniqueLocations = MinimumWage::orderBy('id',"asc")->distinct()->pluck('loction');
        $uniqueBenefits = MinimumWage::orderBy('id',"asc")->distinct()->pluck('benefits');

        // return $uniqueBenefits[0];
        $query = MinimumWage::orderBy('id',"asc");

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
            $query->where('benefits', 'Minimum_Wage_Earners')->latest()->limit(12);
        }
        $datas = $query->get();
        // return $data;

        return view('user.minimum_wage.employee_count.index',compact('datas','uniqueYears','uniqueLocations','uniqueBenefits'));
    }



    public function employee_edit(string $id){
        $data=MinimumWage::find($id);
        return view('user.minimum_wage.employee_count.edit',compact('data'));
    }
    public function employee_update(Request $request, $id){

        $data =[
            'year'=>$request->year,
            'loction'=>$request->loction,
            'month'=>$request->month,
            'pe_male'=>$request->pe_male,
            'pe_female'=>$request->pe_female,
            'te_male'=>$request->te_male,
            'te_female'=>$request->te_female,
        ];
        $test=MinimumWage::where('id',$id)->update($data);
        if ($test){
            toastr()->success('added sucessfully');
            return redirect()->route('minimum_wage.employeecount.index',['year'=>$request->year,'loction'=>$request->loction,'benefits'=>$request->benefits]);
        } else{
            toastr()->error('someting went worng');
            return back();
        }


    }

    public function worker_index( Request $request)
    {
        $uniqueYears = MinimumWage::distinct()->orderBy('year',"asc")->pluck('year');
        $uniqueLocations = MinimumWage::orderBy('id',"asc")->distinct()->pluck('loction');
        $uniqueBenefits = MinimumWage::orderBy('id',"asc")->distinct()->pluck('benefits');
        $query = MinimumWage::orderBy('id',"asc");

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
            $query->where('benefits',  $uniqueBenefits[0])->latest()->limit(12);
        }
        $datas = $query->get();

        return view('user.minimum_wage.worker_count.index',compact('datas','uniqueYears','uniqueLocations','uniqueBenefits'));
    }
    public function worker_edit(string $id){
        $data=MinimumWage::find($id);
        return view('user.minimum_wage.worker_count.edit',compact('data'));
    }

    public function worker_update(Request $request, $id){

        $data =[
            'year'=>$request->year,
            'loction'=>$request->loction,
            'month'=>$request->month,
            'pw_male'=>$request->pw_male,
            'pw_female'=>$request->pw_female,
            'tw_male'=>$request->tw_male,
            'tw_female'=>$request->tw_female,
        ];
        $test=MinimumWage::where('id',$id)->update($data);
        if ($test){
            toastr()->success('added sucessfully');
            return redirect()->route('minimum_wage.workercount.index',['year'=>$request->year,'loction'=>$request->loction, 'benefits'=>$request->benefits]);
        } else{
            toastr()->error('someting went worng');
            return back();
        }

    }
}
