<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Union;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        $uniqueYears = Union::distinct()->orderBy('year', "asc")->pluck('year');
        $uniqueLocations = Union::groupBy('loction')->pluck('loction');
        $monthsArray = [];
        for ($month = 1; $month <= 12; $month++) {
            $firstDayOfMonth = Carbon::create(null, $month, 1, 0, 0, 0);
            $monthsArray[] = $firstDayOfMonth->format('F');
        }

        // return $uniqueBenefits[0];
        $query = Training::orderBy('id', "asc");

        if ($request->has('year') && $request->year != '') {
            $query->where('year', $request->year);
        }
        if ($request->has('loction') && $request->loction != '') {
            $query->where('loction', $request->loction);
        }
        if ($request->has('month') && $request->month != '') {
            $query->where('month', $request->month);
        }
        if (!$request->has('year') && !$request->has('loction')) {
            $query->latest()->limit(12);
        }
        $datas = $query->get();
        // return $data;

        return view('user.training.index', compact('datas', 'uniqueYears', 'uniqueLocations', 'monthsArray'));
    }

    public function create(Request $request)
    {
        $data = $request;
        $attendees = [
            'Board of Directors',
            'Key Managerial Personnel',
            'Employees',
            'Workers',
            'Value Chain Partners',
            'Governance Body Members',
            'Business Partners',
            'Security Personnel'
        ];
        $training_topics = [
            'Environment, Health & Safety',
            'Anti-Corruption Policies & Procedures',
            'Anti-Bribery',
            'Human Rights',
            'Employee Performance & Career Development',
            'ESG & BRSR topics',
            'Skill Upgradation/Development',
            'Sexual Harassment'
        ];
        // return $data;
        return view('user.training.create', compact('data', 'attendees', 'training_topics'));
    }


    public function store(Request $request)
    {

        $data = [
            'year' => $request->year,
            'loction' => $request->loction,
            'month' => $request->month,
            'attendee' => $request->attendee,
            'training_topic' => $request->training_topic,
            'training_topic_other' => $request->training_topic_other,
            'no_of_training' => $request->no_of_training,
            'no_of_participants' => $request->no_of_participants,
            'total_days' => $request->total_days,
            'total_personnel_covered' => $request->total_personnel_covered,
        ];
        // return $data;
        $test = Training::create($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('training.index', ['year' => $request->year, 'loction' => $request->loction, 'month' => $request->month,]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }



    }

    public function edit(string $id)
    {
        $attendees = [
            'Board of Directors',
            'Key Managerial Personnel',
            'Employees',
            'Workers',
            'Value Chain Partners',
            'Governance Body Members',
            'Business Partners',
            'Security Personnel'
        ];
        $training_topics = [
            'Environment, Health & Safety',
            'Anti-Corruption Policies & Procedures',
            'Anti-Bribery',
            'Human Rights',
            'Employee Performance & Career Development',
            'ESG & BRSR topics',
            'Skill Upgradation/Development',
            'Sexual Harassment'
        ];
        $data = Training::find($id);
        return view('user.training.edit', compact('data', 'attendees', 'training_topics'));
    }
    public function update(Request $request, $id)
    {

        $data = [
            'year' => $request->year,
            'loction' => $request->loction,
            'month' => $request->month,
            'attendee' => $request->attendee,
            'training_topic' => $request->training_topic,
            'training_topic_other' => $request->training_topic_other,
            'no_of_training' => $request->no_of_training,
            'no_of_participants' => $request->no_of_participants,
            'total_days' => $request->total_days,
            'total_personnel_covered' => $request->total_personnel_covered,
        ];

        $test = Training::where('id', $id)->update($data);
        if ($test) {
            toastr()->success('added sucessfully');
            return redirect()->route('training.index', ['year' => $request->year, 'loction' => $request->loction, 'month' => $request->month,]);
        } else {
            toastr()->error('someting went worng');
            return back();
        }



    }
}
