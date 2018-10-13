<?php

namespace App\Http\Controllers;

use App\Mainactivity;
use App\Expectedoutput;

use App\Task;
use App\User;
use App\Unit;
use App\Annualworkplan;
use App\Rollingplan;
use App\Taskuser;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:task-list');
        $this->middleware('permission:task-create', ['only' => ['create','store']]);
        $this->middleware('permission:task-edit', ['only' => ['edit','update']]);


        $this->middleware('permission:task-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(5);
        return view('tasks.index',compact('tasks'))
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
        $units = Unit::all();
        $annualworkplans = Annualworkplan::all();
        $rollingplans = Rollingplan::all();
        $users = User::all();
        return view('tasks.create',compact('mainactivities', 'expectedoutputs','users','units','annualworkplans','rollingplans'));
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
            'rollingplan_id' => 'required',
            'unit_id' => 'required',
            'annualworkplan_id' => 'required',
            'task_name' => 'required',
            'task_description' => 'required',
            'mainactivity_id' => 'required',
            'expectedoutput_id' => 'required',
            'priority' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'user_id' => 'required',
        ]);

        $rollingplan_id = $request->input('rollingplan_id');
        $unit_id = $request->input('unit_id');
        $annualworkplan_id = $request->input('annualworkplan_id');
        $task_name = $request->input('task_name');
        $task_description = $request->input('task_description');
        $mainactivity_id= $request->input('mainactivity_id');
        $expectedoutput_id = $request->input('expectedoutput_id');
        $priority = $request->input('priority');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $user_id = $request->input('user_id');

        $task = Task::create([
            'task_name' => $task_name,
            'task_description' => $task_description,
            'rollingplan_id' => $rollingplan_id,
            'unit_id' => $unit_id,
            'annualworkplan_id' => $annualworkplan_id,
            'mainactivity_id' => $mainactivity_id,
            'expectedoutput_id' => $expectedoutput_id,
            'priority' => $priority,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'user_id' => $user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $task_id = $task->id;

        //assign staff to the task
        $taskusers = $request->input('task_user_id');

        if(!empty($taskusers))
        {
            foreach ($taskusers as $key=>$taskuser) {
                Taskuser::create(['task_id' => $task_id, 'user_id' => $taskuser]);
            }
        }

        return redirect()->route('tasks.index')
            ->with('success','Task created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $rollingplan = Rollingplan::find($task->rollingplan_id);
        $unit = Unit::find($task->unit_id);
        $annualworkplan = Annualworkplan::find($task->annualworkplan_id);
        $mainactivity = Mainactivity::find($task->mainactivity_id);
        $expectedoutput = Expectedoutput::find($task->expectedoutput_id);
        $users = User::all();

        $taskusers = $task->taskusers;

        return view('tasks.edit',compact('rollingplan', 'unit','users','annualworkplan','mainactivity','expectedoutput','task','taskusers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        request()->validate([
            'task_name' => 'required',
            'task_description' => 'required',
            'priority' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'user_id' => 'required',
        ]);

        $task_name = $request->input('task_name');
        $task_description = $request->input('task_description');
        $priority = $request->input('priority');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $user_id = $request->input('user_id');

        $task->update([
            'task_name' => $task_name,
            'task_description' => $task_description,
            'priority' => $priority,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'user_id' => $user_id,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('tasks.index')
            ->with('success','Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();


        return redirect()->route('tasks.index')
            ->with('success','Task deleted successfully');
    }
}
