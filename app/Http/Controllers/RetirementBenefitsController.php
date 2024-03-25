<?php

namespace App\Http\Controllers;

use App\Models\RetirementBenefits;
use Illuminate\Http\Request;

class RetirementBenefitsController extends Controller
{
    public function index( Request $request)
    {
        $uniqueYears = RetirementBenefits::distinct()->orderBy('year',"asc")->pluck('year');
        $uniqueLocations = RetirementBenefits::groupBy('loction')->pluck('loction');
        $uniqueBenefits = RetirementBenefits::groupBy('benefits')->pluck('benefits');

        // return $uniqueBenefits;
        $query = RetirementBenefits::orderBy('id',"asc");

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
            $query->where('benefits', 'PF' )->latest()->limit(12);
        }
        $datas = $query->get();
        // return $data;

        return view('user.retirement_benefits.index',compact('datas','uniqueYears','uniqueLocations','uniqueBenefits'));
    }



    public function edit(string $id){
        $data=RetirementBenefits::find($id);
        return view('user.retirement_benefits.edit',compact('data'));
    }
    public function update(Request $request, $id){

        $data =[
            'year'=>$request->year,
            'loction'=>$request->loction,
            'month'=>$request->month,
            'total_employees'=>$request->total_employees,
            'total_workers'=>$request->total_workers,
            'remarks'=>$request->remarks,
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
        $test=RetirementBenefits::where('id',$id)->update($data);
        if ($test){
            toastr()->success('added sucessfully');
            return redirect()->route('retirement_benefits.index',['year'=>$request->year,'loction'=>$request->loction,'benefits'=>$request->benefits]);
        } else{
            toastr()->error('someting went worng');
            return back();
        }


    }
}
