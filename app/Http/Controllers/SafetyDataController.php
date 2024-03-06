<?php

namespace App\Http\Controllers;

use App\Models\SafetyData;
use Illuminate\Http\Request;

class SafetyDataController extends Controller
{
    public function index( Request $request)
    {
        $uniqueYears = SafetyData::distinct()->orderBy('year',"asc")->pluck('year');
        $uniqueLocations = SafetyData::groupBy('loction')->pluck('loction');

        // return $uniqueBenefits[0];
        $query = SafetyData::orderBy('id',"asc");

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

        return view('user.safety_data.index',compact('datas','uniqueYears','uniqueLocations'));
    }



    public function edit(string $id){
        $data=SafetyData::find($id);
        return view('user.safety_data.edit',compact('data'));
    }
    public function update(Request $request, $id){

        $data =[
            'year'=>$request->year,
            'loction'=>$request->loction,
            'month'=>$request->month,
            'no_of_employee'=>$request->no_of_employee,
            'no_of_working_day'=>$request->no_of_working_day,
            'last_date_of_accient'=>$request->last_date_of_accient,
            'first_aid_cases'=>$request->first_aid_cases,
            'non_recordable_injury'=>$request->non_recordable_injury,
            'recordable_injury'=>$request->recordable_injury,
            'man_days_lost'=>$request->man_days_lost,
            'near_miss'=>$request->near_miss,
            'no_of_kaizen'=>$request->no_of_kaizen,
            'ehs_training'=>$request->ehs_training,
        ];
        $test=SafetyData::where('id',$id)->update($data);
        if ($test){
            toastr()->success('added sucessfully');
            return redirect()->route('safety_data.index',['year'=>$request->year,'loction'=>$request->loction]);
        } else{
            toastr()->error('someting went worng');
            return back();
        }


    }
}
