<?php

namespace App\Http\Controllers;

use App\Models\EnergyData;
use Illuminate\Http\Request;

class EnergyDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $query = EnergyData::orderBy('id',"asc");

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
        $data = $query->get();
        $uniqueYears = EnergyData::orderBy('id',"asc")->distinct()->pluck('year');
        $uniqueLocations = EnergyData::orderBy('id',"asc")->distinct()->pluck('loction');
        // return $uniqueYears;
        return view('user.energy_data.index', compact('data','uniqueYears','uniqueLocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.energy_data.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =[
            'year'=>$request->year,
            'loction'=>$request->loction,
            'month'=>$request->month,
            'fuel_for_diesel_generators'=>$request->fuel_for_diesel_generators,
            'power_from_diesel_generators'=>$request->power_from_diesel_generators,
            'electricity'=>$request->electricity,
            'power_purchase_agreement'=>$request->power_purchase_agreement,
            'captive_power'=>$request->captive_power
        ];
        return $data;
        $energy_data=EnergyData::create($data);
        if ($energy_data){
            return view('user.energy_data.index');
        } else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=EnergyData::find($id);
        return view('user.energy_data.create',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $energy_data =[
            'year'=>$request->year,
            'loction'=>$request->loction,
            'month'=>$request->month,
            'fuel_for_diesel_generators'=>$request->fuel_for_diesel_generators,
            'power_from_diesel_generators'=>$request->power_from_diesel_generators,
            'electricity'=>$request->electricity,
            'power_purchase_agreement'=>$request->power_purchase_agreement,
            'captive_power'=>$request->captive_power
        ];
        $data=EnergyData::where('id',$id)->update($energy_data);
        if ($data){
            return redirect()->route('energy_data.index');
        } else{
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function addmonth(Request $request){
        // return $request;
        return view('user.energy_data.create',compact('request'));
    }
}
