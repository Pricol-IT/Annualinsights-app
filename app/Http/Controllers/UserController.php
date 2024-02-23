<?php

namespace App\Http\Controllers;

use App\Models\EmployeeWorkerCount;
use App\Models\EnergyData;
use App\Models\HiringCount;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function commuteform(){
        return view('user.commuteform');
    }

    public function financialyear(){
        return view('user.financialyear');
    }

    public function generatefinancialyear( Request $request){
    $data = explode('-', $request->financialyear);
// return $data;
    $period = CarbonPeriod::create(
    now()->year($data[0])->month(4)->startOfMonth()->format('Y-m-d'),
    '1 month',
    now()->year('20'.$data[1])->month(3)->endOfMonth()->format('Y-m-d')
    );
    //return $period;
    $finYear = [];
    foreach ($period as $p) {
        $finYear[] = $p->format('M-y');
    }

// return $finYear;
    $plants=['Plant-Corporate','Plant-1','Plant-2','Plant-3','Plant-5','Plant-7','Plant-9','Plant-10','Plant-12'];
    foreach($plants as $plant){
        foreach($finYear as $month){
            // $energy_data = EnergyData::create([
            // 'year' => $request->financialyear,
            // 'loction'=>$plant,
            // 'month'=>$month,
            // 'fuel_for_diesel_generators'=>0,
            // 'power_from_diesel_generators'=>0,
            // 'electricity'=>0,
            // 'power_purchase_agreement'=>0,
            // 'captive_power'=>0
            // ]);

            // $employee_worker_count = [
            //     'year' => $request->financialyear,
            // 'loction'=>$plant,
            // 'month'=>$month,
            // ];
            // $employee_worker_test=EmployeeWorkerCount::create($employee_worker_count);
            // return $employee_worker_count;
            $hiring_count = [
                'year' => $request->financialyear,
            'loction'=>$plant,
            'month'=>$month,
            ];
            
            $hiring_test=HiringCount::create($hiring_count);
        
    }
}
    // return $hiring_count;
if($hiring_count){
    toastr()->success($request->financialyear.' year is generated');
    return view('user.financialyear');
}else{
    toastr()->error($request->financialyear.' year is not generated');
    return back();
}
        
    }
    
}
