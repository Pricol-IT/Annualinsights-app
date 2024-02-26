<?php

namespace App\Http\Controllers;

use App\Models\Union;
use Illuminate\Http\Request;

class UnionController extends Controller
{
    public function index( Request $request)
    {
        $uniqueYears = Union::distinct()->orderBy('year',"asc")->pluck('year');
        $uniqueLocations = Union::orderBy('id',"asc")->distinct()->pluck('loction');

        // return $uniqueBenefits[0];
        $query = Union::orderBy('id',"asc");

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

        return view('user.union.index',compact('datas','uniqueYears','uniqueLocations'));
    }



    public function edit(string $id){
        $data=Union::find($id);
        return view('user.union.edit',compact('data'));
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
            'remarks'=>$request->remarks,
        ];
        $test=Union::where('id',$id)->update($data);
        if ($test){
            toastr()->success('added sucessfully');
            return redirect()->route('union.index',['year'=>$request->year,'loction'=>$request->loction]);
        } else{
            toastr()->error('someting went worng');
            return back();
        }


    }
}
