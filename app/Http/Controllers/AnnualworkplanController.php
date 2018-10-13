<?php

namespace App\Http\Controllers;

use App\Mainactivity;
use App\Sourceoffunding;
use App\Unit;
use App\Division;
use App\Department;
use App\Rollingplan;
use App\Annualworkplan;
use App\Resultarea;
use DB;
use Session;
use Excel;
use File;

//use DemeterChain\Main;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnnualworkplanController extends Controller
{

    function __construct()
    {

        $this->middleware('permission:annualworkplan-list');
        $this->middleware('permission:annualworkplan-create', ['only' => ['create','store']]);
        $this->middleware('permission:annualworkplan-edit', ['only' => ['edit','update']]);


        $this->middleware('permission:annualworkplan-delete', ['only' => ['destroy']]);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $annualworkplans = Annualworkplan::latest()->paginate(5);
        return view('annualworkplans.index',compact('annualworkplans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        $departments = Department::all();
        $rollingplans = Rollingplan::all();
        $units = Unit::all();
        return view('annualworkplans.create',compact('divisions','departments','rollingplans','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'department_id' => 'required',
            'division_id' => 'required',
            'unit_id' => 'required',
            'rollingplan_id' => 'required',
        ]);


        $data = Annualworkplan::create($request->all());

        /**
        return redirect()->route('annualworkplans.index')
            ->with('success','Annual work plan created successfully.');

        **/
        return redirect()->route('annualworkplans.edit', $data->id)
            ->with('success','Annual work plan created successfully. Please add activities');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Annualworkplan $annualworkplan)
    {
        return view('annualworkplans.show',compact('annualworkplan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Annualworkplan $annualworkplan)
    {
        $divisions = Division::all();
        $departments = Department::all();
        $rollingplans = Rollingplan::all();
        $units = Unit::all();
        $resultareas = Resultarea::all();
        $fundingsources = Sourceoffunding::all();

        $mainactivities = Mainactivity::where('annualworkplan_id', $annualworkplan->id)->get();

        //$mainactivities = DB::table('mainactivities')->where('annualworkplan_id', $annualworkplan->id)->get();
        //$mainactivities = Mainactivity::where('annualworkplan_id', '=', $annualworkplan->id)->paginate(15);

        return view('annualworkplans.edit',compact('annualworkplan','divisions','departments','rollingplans','units', 'resultareas','fundingsources','mainactivities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annualworkplan $annualworkplan)
    {
        request()->validate([
            'department_id' => 'required',
            'division_id' => 'required',
            'unit_id' => 'required',
            'rollingplan_id' => 'required',
        ]);

        $department_id = $request->input('department_id');
        $division_id = $request->input('division_id');
        $unit_id = $request->input('unit_id');
        $rollingplan_id = $request->input('rollingplan_id');

        $annualworkplan->department_id = $department_id;
        $annualworkplan->division_id = $division_id;
        $annualworkplan->unit_id = $unit_id;
        $annualworkplan->rollingplan_id = $rollingplan_id;

        $annualworkplan->update();

        //$annualworkplan->update($request->all());


        return redirect()->route('annualworkplans.index')
            ->with('success','Annual work plan updated successfully');
    }

    public function upload($id)
    {
        $annualworkplan = Annualworkplan::find($id);
        $divisions = Division::all();
        $departments = Department::all();
        $rollingplans = Rollingplan::all();
        $units = Unit::all();
        $resultareas = Resultarea::all();
        return view('annualworkplans.upload',compact('annualworkplan','divisions','departments','rollingplans','units','resultareas'));
    }


    public function import(Request $request)
    {
        //validate the xls file

        $this->validate($request, array(
            'file'      => 'required'
        ));

        if($request->hasFile('file')){

            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();
                if(!empty($data) && $data->count()){

                    foreach ($data as $key=>$value) {

                        if(!empty($value->quarter_one)):
                            $quarter_one = 1;
                        else:
                            $quarter_one = 0;
                        endif;

                        if(!empty($value->quarter_two)):
                            $quarter_two = 1;
                        else:
                            $quarter_two = 0;
                        endif;

                        if(!empty($value->quarter_three)):
                            $quarter_three = 1;
                        else:
                            $quarter_three = 0;
                        endif;

                        if(!empty($value->quarter_four)):
                            $quarter_four = 1;
                        else:
                            $quarter_four = 0;
                        endif;


                        $mainactivity_id = DB::table('mainactivities')->insertGetId([
                            'annualworkplan_id' => $request->annualworkplan_id,
                            'resultarea_id' => $request->resultarea_id,
                            'activity_name' => $value->main_activities,
                            'quarter_one' => $quarter_one,
                            'quarter_two' => $quarter_two,
                            'quarter_three' => $quarter_three,
                            'quarter_four' => $quarter_four,
                            'cost_requirements' => $value->costed_requirements,
                            'on_budget_amount' => $value->on_budget_amount,
                            'off_budget_amount' => $value->off_budget_amount,
                            'finding_gap' => $value->gap,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);

                        $expectedoutput_id = DB::table('expectedoutputs')->insertGetId([
                            'output' => $value->outputs,
                            'mainactivity_id' => $mainactivity_id,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);

                        DB::table('performanceindicators')->insertGetId([
                            'indicator' => $value->outputs,
                            'target_output' => $value->target_output,
                            'means_of_verification' => $value->means_of_verification,
                            'expectedoutput_id' => $expectedoutput_id,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);


                       //dd($value);


                    }
                    Session::flash('success', 'Your Data has successfully imported');

                    /**

                    if(!empty($insert)){


                        $insertData = DB::table('mainactivities')->insert($insert);
                        //$insertData = DB::table('mainactivities')->insertGetId($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }


                    }

                    **/


                }

                return back();

            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();


            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();


        return redirect()->route('annualworkplans.index')
            ->with('success','Annual work plan deleted successfully');
    }

    public function getDivisions($id) {
        $divisions = DB::table("divisions")->where("department_id",$id)->pluck("division_name","id");

        return json_encode($divisions);

    }

    public function getUnits($id) {
        $units = DB::table("units")->where("division_id",$id)->pluck("unit_name","id");

        return json_encode($units);

    }

    public function getActivities($id) {
        $activities = Mainactivity::where("annualworkplan_id",$id)->get();

        $select = '<select name="mainactivity_id" id="mainactivity_id" class="form-control" required="required" onChange="getOutputs()">';

        $select .= '<option value="0">Select Activity</option>';
        foreach ($activities as $activity):

            $select .= '<option value="'.$activity->id.'">'.$activity->activity_name.'</option>';

        endforeach;
        $select .= '</select>';


        print $select;
    }
}
