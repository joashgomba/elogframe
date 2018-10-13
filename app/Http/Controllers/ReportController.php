<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mesindicatortracking;
use App\Mesindicatortracingindicator;
use App\County;
use App\Indicatorcategory;
use App\Mesindicator;
use App\Rollingplan;
use App\Unit;
use App\Division;
use App\Department;
use App\Annualworkplan;
use App\Mainactivity;
use App\User;

class ReportController extends Controller
{
    function __construct()
    {

    }

    public function index()
    {

        $counties = County::all();
        $indicatorcategories = Indicatorcategory::all();
        $rollingplans = Rollingplan::all();

        return view('reports.index',compact('counties', 'indicatorcategories', 'rollingplans'));

    }


    public function overall(Request $request)
    {
        $county = County::find($request->county_id);
        $indicatorcategory = Indicatorcategory::find($request->indicatorcategory_id);
        $rollingplan = Rollingplan::find($request->rollingplan_id);
        $quarter = $request->quarter;

        $whereData = [
            ['indicatorcategory_id', $request->indicatorcategory_id]
        ];


        $mesindicators = Mesindicator::where($whereData)->get();

        return view('reports.overall',compact('county', 'indicatorcategory', 'rollingplan', 'quarter','mesindicators'));
    }

    public function countyindicator()
    {

        $indicatorcategories = Indicatorcategory::all();
        $rollingplans = Rollingplan::all();

        return view('reports.countyindicator',compact('indicatorcategories', 'rollingplans'));

    }

    public function countyreport(Request $request)
    {
        $rollingplan = Rollingplan::find($request->rollingplan_id);
        $quarter = $request->quarter;
        $indicatorcategory = Indicatorcategory::find($request->indicatorcategory_id);
        $mesindicator = Mesindicator::find($request->mesindicator_id);
        $counties = County::all();

        return view('reports.countyreport',compact('rollingplan', 'quarter', 'indicatorcategory','mesindicator', 'counties'));
    }

    public function activityindicator()
    {
        $divisions = Division::all();
        $departments = Department::all();
        $rollingplans = Rollingplan::all();
        $units = Unit::all();
        return view('reports.activityindicator',compact('divisions','departments','rollingplans','units'));

    }

    public function indicatorreport(Request $request)
    {
        $division = Division::find($request->division_id);
        $department = Department::find($request->department_id);
        $rollingplan = Rollingplan::find($request->rollingplan_id);
        $unit = Unit::find($request->unit_id);

        $whereData = [
            ['unit_id', $request->unit_id],
            ['rollingplan_id', $request->rollingplan_id]
        ];

        $annualworkplan = Annualworkplan::where($whereData)->first();

        $mainactivities = Mainactivity::where('annualworkplan_id', $annualworkplan->id)->get();

        return view('reports.indicatorreport',compact('division','department','rollingplan','unit','annualworkplan','mainactivities'));

    }

    public function activityimplementation()
    {
        $divisions = Division::all();
        $departments = Department::all();
        $rollingplans = Rollingplan::all();
        $units = Unit::all();
        return view('reports.activityimplementation',compact('divisions','departments','rollingplans','units'));
    }

    public function activityreport(Request $request)
    {
        $division = Division::find($request->division_id);
        $department = Department::find($request->department_id);
        $rollingplan = Rollingplan::find($request->rollingplan_id);
        $unit = Unit::find($request->unit_id);

        $whereData = [
            ['unit_id', $request->unit_id],
            ['rollingplan_id', $request->rollingplan_id]
        ];

        $annualworkplan = Annualworkplan::where($whereData)->first();

        $mainactivities = Mainactivity::where('annualworkplan_id', $annualworkplan->id)->get();

        return view('reports.activityreport',compact('division','department','rollingplan','unit','annualworkplan','mainactivities'));
    }

    public function taskreport(Request $request)
    {
        $division = Division::find($request->division_id);
        $department = Department::find($request->department_id);
        $rollingplan = Rollingplan::find($request->rollingplan_id);
        $unit = Unit::find($request->unit_id);
        $users = User::all();

        $whereData = [
            ['unit_id', $request->unit_id],
            ['rollingplan_id', $request->rollingplan_id]
        ];

        $annualworkplan = Annualworkplan::where($whereData)->first();

        $mainactivities = Mainactivity::where('annualworkplan_id', $annualworkplan->id)->get();

        return view('reports.taskreport',compact('division','department','rollingplan','unit','annualworkplan','mainactivities','users'));
    }

    public function getIndicators($indicatorcategory_id)
    {
        $whereData = [
            ['indicatorcategory_id', $indicatorcategory_id]
        ];


        $mesindicators = Mesindicator::where($whereData)->get();

        $select = '<select name="mesindicator_id" class="form-control" required="required">';

        foreach ($mesindicators as $mesindicator):
            $select .= '<option value="'.$mesindicator->id.'">'.$mesindicator->indicator_name.'</option>';
        endforeach;

        $select .= '</select>';

        print $select;
    }
}
