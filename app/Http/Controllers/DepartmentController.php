<?php

namespace App\Http\Controllers;

use App\Department;
use App\Ministry;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:department-list');
        $this->middleware('permission:department-create', ['only' => ['create','store']]);
        $this->middleware('permission:department-edit', ['only' => ['edit','update']]);


        $this->middleware('permission:department-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        if($user->hasRole('Super Admin'))
        {
            //echo 'Super Admin';
            //echo $user->id;
        }

        $departments = Department::latest()->paginate(5);
        return view('departments.index',compact('departments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ministries = Ministry::all();
        return view('departments.create',compact('ministries'));
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
            'department_name' => 'required',
            'ministry_id' => 'required',
        ]);


        Department::create($request->all());


        return redirect()->route('departments.index')
            ->with('success','Department created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('departments.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $ministries = Ministry::all();

        return view('departments.edit',compact('department','ministries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        request()->validate([
            'department_name' => 'required',
            'ministry_id' => 'required',
        ]);


        $department->update($request->all());


        return redirect()->route('departments.index')
            ->with('success','Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();


        return redirect()->route('departments.index')
            ->with('success','Department deleted successfully');
    }
}
