<?php

namespace App\Http\Controllers;

use App\Models\DifferentlyAbled;
use App\Models\EmployeeWorkerBenefit;
use App\Models\EmployeeWorkerCount;
use App\Models\EnergyData;
use App\Models\HiringCount;
use App\Models\TurnOver;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function commuteform()
    {
        return view('user.commuteform');
    }

    public function financialyear()
    {
        return view('user.financialyear');
    }

    public function generatefinancialyear(Request $request)
    {
        $data = explode('-', $request->financialyear);
        // return $data;
        $period = CarbonPeriod::create(
            now()->year($data[0])->month(4)->startOfMonth()->format('Y-m-d'),
            '1 month',
            now()->year('20' . $data[1])->month(3)->endOfMonth()->format('Y-m-d')
        );
        //return $period;
        $finYear = [];
        foreach ($period as $p) {
            $finYear[] = $p->format('M-y');
        }
        // return $finYear;
        $plants = ['Plant-Corporate', 'Plant-1', 'Plant-2', 'Plant-3', 'Plant-5', 'Plant-7', 'Plant-9', 'Plant-10', 'Plant-12'];
        foreach ($plants as $plant) {
            foreach ($finYear as $month) {
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

                // $hiring_count = [
                //     'year' => $request->financialyear,
                // 'loction'=>$plant,
                // 'month'=>$month,
                // ];
                // $hiring_test=HiringCount::create($hiring_count);

                // $turnover = [
                //     'year' => $request->financialyear,
                //     'loction' => $plant,
                //     'month' => $month,
                // ];
                // $turnover_test = TurnOver::create($turnover);

                // $differentlyabled = [
                //     'year' => $request->financialyear,
                //     'loction' => $plant,
                //     'month' => $month,
                // ];
                // $differentlyabled_test = DifferentlyAbled::create($differentlyabled);
                $benefits = ['Health_Insurance','Accident_Insurance','Maternity_Benefits','Paternity_Benefits','Day_care_facilities'];
                foreach ($benefits as $benefit){
                $employeeworkerbenefits = [
                    'year' => $request->financialyear,
                    'loction' => $plant,
                    'month' => $month,
                    'benefits' => $benefit,

                ];
                $employeeworkerbenefits_test = EmployeeWorkerBenefit::create($employeeworkerbenefits);
                // print_r($employeeworkerbenefits_test);
            }

            }
        }
        // return $employeeworkerbenefits_test;
        if ($employeeworkerbenefits_test) {
            toastr()->success($request->financialyear . ' year is generated');
            return view('user.financialyear');
        } else {
            toastr()->error($request->financialyear . ' year is not generated');
            return back();
        }

    }

}
