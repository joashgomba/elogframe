<?php

namespace App\Http\Controllers;
use App\Department;
use App\Division;

use Illuminate\Http\Request;

class DivisionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:division-list');
        $this->middleware('permission:division-create', ['only' => ['create','store']]);
        $this->middleware('permission:division-edit', ['only' => ['edit','update']]);


        $this->middleware('permission:division-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $divisions = Division::latest()->paginate(5);
        return view('divisions.index',compact('divisions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('divisions.create',compact('departments'));
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
            'division_name' => 'required',
            'department_id' => 'required',
        ]);


        Division::create($request->all());


        return redirect()->route('divisions.index')
            ->with('success','Division created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        return view('divisions.show',compact('division'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        $departments = Department::all();

        return view('divisions.edit',compact('division','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        request()->validate([
            'division_name' => 'required',
            'department_id' => 'required',
        ]);


        $division->update($request->all());


        return redirect()->route('divisions.index')
            ->with('success','Division updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        $division->delete();


        return redirect()->route('divisions.index')
            ->with('success','Division deleted successfully');
    }
}
