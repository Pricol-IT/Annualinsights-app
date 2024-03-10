<?php

namespace App\Http\Controllers;

use App\Models\DifferentlyAbled;
use App\Models\EmployeeWorkerBenefit;
use App\Models\EmployeeWorkerCount;
use App\Models\EnergyData;
use App\Models\HiringCount;
use App\Models\MinimumWage;
use App\Models\ParentalLeave;
use App\Models\RetirementBenefits;
use App\Models\SafetyData;
use App\Models\TurnOver;
use App\Models\Union;
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
                $energy_data = EnergyData::create([
                'year' => $request->financialyear,
                'loction'=>$plant,
                'month'=>$month,
                'fuel_for_diesel_generators'=>0,
                'power_from_diesel_generators'=>0,
                'electricity'=>0,
                'power_purchase_agreement'=>0,
                'captive_power'=>0
                ]);

        //         $employee_worker_count = [
        //             'year' => $request->financialyear,
        //         'loction'=>$plant,
        //         'month'=>$month,
        //         ];
        //         $employee_worker_test=EmployeeWorkerCount::create($employee_worker_count);

        //         $hiring_count = [
        //             'year' => $request->financialyear,
        //         'loction'=>$plant,
        //         'month'=>$month,
        //         ];
        //         $hiring_test=HiringCount::create($hiring_count);

        //         $turnover = [
        //             'year' => $request->financialyear,
        //             'loction' => $plant,
        //             'month' => $month,
        //         ];
        //         $turnover_test = TurnOver::create($turnover);

        //         $differentlyabled = [
        //             'year' => $request->financialyear,
        //             'loction' => $plant,
        //             'month' => $month,
        //         ];
        //         $differentlyabled_test = DifferentlyAbled::create($differentlyabled);

            //     $benefits = ['Health_Insurance','Accident_Insurance','Maternity_Benefits','Paternity_Benefits','Day_care_facilities','ESIC','WC'];
            //     foreach ($benefits as $benefit){
            //     $employeeworkerbenefits = [
            //         'year' => $request->financialyear,
            //         'loction' => $plant,
            //         'month' => $month,
            //         'benefits' => $benefit,
            //     ];
            //     $employeeworkerbenefits_test = EmployeeWorkerBenefit::create($employeeworkerbenefits);
            // }

        //     $conditions= ['Minimum_Wage_Earners','Above_Minimum_Wage_Earners'];
        //         foreach ($conditions as $condition){
        //         $minimumwage = [
        //             'year' => $request->financialyear,
        //             'loction' => $plant,
        //             'month' => $month,
        //             'benefits' => $condition,
        //         ];
        //         $minimumwage_test = MinimumWage::create($minimumwage);
        //     }

        //     $leaveconditions= ['Entitled_to_Parental_Leave','Took_Parental_Leave','Returned_to_Work_Post_Leave','Still_Employed_12_Months_Later','Due_to_Return_Soon','Returns_from_Prior_Periods'];
        //         foreach ($leaveconditions as $leavecondition){
        //         $parentalleave = [
        //             'year' => $request->financialyear,
        //             'loction' => $plant,
        //             'month' => $month,
        //             'benefits' => $leavecondition,
        //         ];
        //         $parentalleave_test = ParentalLeave::create($parentalleave);
        //     }

        //     $retirementbenefits= ['PF', 'Gratuity', 'ESI'];
        //     foreach ($retirementbenefits as $retirementbenefit){
        //     $retirementbenefits_data = [
        //         'year' => $request->financialyear,
        //         'loction' => $plant,
        //         'month' => $month,
        //         'benefits' => $retirementbenefit,
        //     ];
        //     $retirementbenefits_test = RetirementBenefits::create($retirementbenefits_data);
        // }

        // $union = [
        //         'year' => $request->financialyear,
        //         'loction' => $plant,
        //         'month' => $month,
        //     ];
        //     $union_test = Union::create($union);

            $saftey_data = [
                'year' => $request->financialyear,
                'loction' => $plant,
                'month' => $month,
            ];
            $saftey_data_test = SafetyData::create($saftey_data);

            }
        }
        // return $employeeworkerbenefits_test;
        if ($saftey_data_test) {
            toastr()->success($request->financialyear . ' year is generated');
            return view('user.financialyear');
        } else {
            toastr()->error($request->financialyear . ' year is not generated');
            return back();
        }

    }

}
