<?php

namespace App\Http\Controllers;

use App\Models\DifferentlyAbled;
use Illuminate\Http\Request;

class DifferentlyAbledController extends Controller
{
    public function employee_index( Request $request)
    {
        $query = DifferentlyAbled::orderBy('id',"asc");

        if($request->has('year')  && $request->year != '')
        {
            $query->where('year', $request->year);
        }
        if($request->has('loction')  && $request->loction != '')
        {
            $query->where('loction', $request->loction);
        }
        if(!$request->has('year')  && !$request->has('loction'))
        {
            $query->latest()->limit(12);
        }
        $datas = $query->get();
        // return $data;
        $uniqueYears = DifferentlyAbled::distinct()->orderBy('year',"asc")->pluck('year');
        $uniqueLocations = DifferentlyAbled::orderBy('id',"asc")->distinct()->pluck('loction');
        return view('user.differently_abled.employee_count.index',compact('datas','uniqueYears','uniqueLocations'));
    }



    public function employee_edit(string $id){
        $data=DifferentlyAbled::find($id);
        return view('user.differently_abled.employee_count.edit',compact('data'));
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
        $test=DifferentlyAbled::where('id',$id)->update($data);
        if ($test){
            toastr()->success('added sucessfully');
            return redirect()->route('differently_abled.employeecount.index',['year'=>$request->year,'loction'=>$request->loction]);
        } else{
            toastr()->error('someting went worng');
            return back();
        }


    }

    public function worker_index( Request $request)
    {
        $query = DifferentlyAbled::orderBy('id',"asc");

        if($request->has('year')  && $request->year != '')
        {
            $query->where('year', $request->year);
        }
        if($request->has('loction')  && $request->loction != '')
        {
            $query->where('loction', $request->loction);
        }
        if(!$request->has('year')  && !$request->has('loction'))
        {
            $query->latest()->limit(12);
        }
        $datas = $query->get();
        $uniqueYears = DifferentlyAbled::distinct()->orderBy('year',"asc")->pluck('year');
        $uniqueLocations = DifferentlyAbled::orderBy('id',"asc")->distinct()->pluck('loction');
        return view('user.differently_abled.worker_count.index',compact('datas','uniqueYears','uniqueLocations'));
    }
    public function worker_edit(string $id){
        $data=DifferentlyAbled::find($id);
        return view('user.differently_abled.worker_count.edit',compact('data'));
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
        $test=DifferentlyAbled::where('id',$id)->update($data);
        if ($test){
            toastr()->success('added sucessfully');
            return redirect()->route('differently_abled.workercount.index',['year'=>$request->year,'loction'=>$request->loction]);
        } else{
            toastr()->error('someting went worng');
            return back();
        }

    }
}
