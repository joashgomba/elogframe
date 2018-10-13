<?php

namespace App\Http\Controllers;

use App\Mainactivity;
use App\Expectedoutput;
use App\Performanceindicator;
use App\Task;
use App\Taskuser;
use App\Rollingplan;
use App\User;
use App\Unit;
use App\Annualworkplan;
use DB;
use Session;
use Excel;
use File;

use App\Taskreporting;
use Illuminate\Http\Request;

class TaskreportingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:taskreporting-list');
        $this->middleware('permission:taskreporting-create', ['only' => ['create','store']]);
        $this->middleware('permission:taskreporting-edit', ['only' => ['edit','update']]);


        $this->middleware('permission:taskreporting-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$taskreportings = Taskreporting::latest()->paginate(5);
        $user_id = \Auth::id();
        $usertasks = Taskuser::where('user_id', $user_id)->paginate(5);
        return view('taskreportings.index',compact('usertasks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainactivities = Mainactivity::all();
        $expectedoutputs = Expectedoutput::all();
        $performanceindicators = Performanceindicator::all();
        $user_id = \Auth::id();
        $tasks = Taskuser::where('user_id', $user_id)->get();
        return view('taskreportings.create',compact('mainactivities', 'expectedoutputs','performanceindicators','tasks'));
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
            'report_title' => 'required',
            'reporting_date' => 'required',
            'quarter' => 'required',
            'output_target' => 'required',
            'status' => 'required',
            'percentage_progress' => 'required',
            'target_met' => 'required',
            'target_numbers' => 'required',
            'description_of_achievement' => 'required',
            'attachment' => 'required',
        ]);

        $user_id = \Auth::id();

        $file = $request->file('attachment');
        $destinationPath = 'files';
        $file->move($destinationPath,$file->getClientOriginalName());

        DB::table('taskreportings')->insertGetId([
            'report_title' => $request->report_title,
            'reporting_date' => $request->reporting_date,
            'quarter' => $request->quarter,
            'mainactivity_id' => $request->mainactivity_id,
            'expectedoutput_id' => $request->expectedoutput_id,
            'performanceindicator_id' => $request->performanceindicator_id,
            'task_id' => $request->task_id,
            'output_target' => $request->output_target,
            'status' => $request->status,
            'percentage_progress' => $request->percentage_progress,
            'target_met' => $request->target_met,
            'target_numbers' => $request->target_numbers,
            'description_of_achievement' => $request->description_of_achievement,
            'attachment' => $file->getClientOriginalName(),
            'user_id' => $user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


        return redirect()->route('taskreportings.index')
            ->with('success','Task reporting created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getOutputs($id)
    {
        $task = Task::find($id);
        $outputs = Expectedoutput::where("mainactivity_id",$task->mainactivity_id)->get();

        $select = '<select name="expectedoutput_id" id="expectedoutput_id" class="form-control" required="required" >';

        $select .= '<option value="">Select Output</option>';
        foreach ($outputs as $output):

            $select .= '<option value="'.$output->id.'">'.$output->output.'</option>';

        endforeach;
        $select .= '</select>';


        print $select;
    }
	
	public function logTasks($id)
	{
		$task = Task::find($id);
		$rollingplan = Rollingplan::find($task->rollingplan_id);
        $unit = Unit::find($task->unit_id);
        $annualworkplan = Annualworkplan::find($task->annualworkplan_id);
        $mainactivity = Mainactivity::find($task->mainactivity_id);
        $expectedoutput = Expectedoutput::find($task->expectedoutput_id);
        $users = User::all();
		
		$taskreportings = Taskreporting::where("task_id",$task->id)->get();
		
		$taskusers = $task->taskusers;
		
		return view('taskreportings.logtasks',compact('rollingplan', 'unit','users','annualworkplan','mainactivity','expectedoutput','task','taskusers','taskreportings'));
	}
}
