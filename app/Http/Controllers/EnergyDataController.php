<?php

namespace App\Http\Controllers;

use App\Models\EnergyData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $uniqueYears = EnergyData::distinct()->orderBy('year',"asc")->pluck('year');
        $uniqueLocations = EnergyData::groupBy('loction')->pluck('loction');
        // return $uniqueLocations;

        $currentyeartotal=DB::table('energy_data')->selectRaw('SUM(power_from_diesel_generators) as dg')
        ->selectRaw('SUM(electricity) as ecity')->selectRaw('SUM(power_purchase_agreement) as ppa')->selectRaw('SUM(captive_power) as cap')->where('year',$uniqueYears->last())->first();


        $threeyeartotal=DB::table('energy_data')->select('year')->selectRaw('SUM(power_from_diesel_generators + electricity + power_purchase_agreement + captive_power) as total')
        ->groupBy('year')->orderBy('year','desc')->limit(3)->get();

        $piecharttotal=DB::table('energy_data')->selectRaw('SUM(power_from_diesel_generators + electricity + power_purchase_agreement + captive_power) as totalkWh')->selectRaw('SUM( power_purchase_agreement + captive_power) as RE')->where('year',$uniqueYears->last())->first();
        $RE_percentage=(($piecharttotal->RE)/($piecharttotal->totalkWh))*100;
        // return $RE_percentage;
        return view('user.energy_data.index', compact('data','uniqueYears','uniqueLocations','currentyeartotal','threeyeartotal','RE_percentage'));
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
        // return $data;
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
            'power_from_diesel_generators'=>$request->power_from_diesel_generators,
            'electricity'=>$request->electricity,
            'power_purchase_agreement'=>$request->power_purchase_agreement,
            'captive_power'=>$request->captive_power
        ];
        $data=EnergyData::where('id',$id)->update($energy_data);
        if ($data){
            return redirect()->route('energy_data.index',['year'=>$request->year,'loction'=>$request->loction]);
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
