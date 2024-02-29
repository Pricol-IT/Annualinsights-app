<?php

namespace App\Http\Controllers;

use App\Models\ParentalLeave;
use Illuminate\Http\Request;

class ParentalLeaveController extends Controller
{
    public function index( Request $request)
    {
        $uniqueYears = ParentalLeave::distinct()->orderBy('year',"asc")->pluck('year');
        $uniqueLocations = ParentalLeave::groupBy('loction')->pluck('loction');
        $uniqueBenefits = ParentalLeave::orderBy('id',"asc")->distinct()->pluck('benefits');

        // return $uniqueBenefits[0];
        $query = ParentalLeave::orderBy('id',"asc");

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
            $query->where('benefits', 'Entitled_to_Parental_Leave' )->latest()->limit(12);
        }
        $datas = $query->get();
        // return $data;

        return view('user.parental_leave.index',compact('datas','uniqueYears','uniqueLocations','uniqueBenefits'));
    }



    public function edit(string $id){
        $data=ParentalLeave::find($id);
        return view('user.parental_leave.edit',compact('data'));
    }
    public function update(Request $request, $id){

        $data =[
            'year'=>$request->year,
            'loction'=>$request->loction,
            'month'=>$request->month,
            'em_male'=>$request->em_male,
            'em_female'=>$request->em_female,
            'wr_male'=>$request->wr_male,
            'wr_female'=>$request->wr_female,
        ];
        $test=ParentalLeave::where('id',$id)->update($data);
        if ($test){
            toastr()->success('added sucessfully');
            return redirect()->route('parental_leave.index',['year'=>$request->year,'loction'=>$request->loction,'benefits'=>$request->benefits]);
        } else{
            toastr()->error('someting went worng');
            return back();
        }


    }

}
