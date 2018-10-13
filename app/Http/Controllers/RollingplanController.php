<?php

namespace App\Http\Controllers;

use App\Rollingplan;
use App\Division;

use Illuminate\Http\Request;

class RollingplanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:rollingplan-list');
        $this->middleware('permission:rollingplan-create', ['only' => ['create','store']]);
        $this->middleware('permission:rollingplan-edit', ['only' => ['edit','update']]);


        $this->middleware('permission:rollingplan-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rollingplans = Rollingplan::latest()->paginate(5);
        return view('rollingplans.index',compact('rollingplans'))
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

        $years = [];
        $current_year = date('Y');
        for ($year=$current_year-2; $year <= $current_year+1; $year++) $years[$year] = $year;

        return view('rollingplans.create',compact('divisions','years'));
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
            'start_year' => 'required',
            'end_year' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'quarter_one_start_date' => 'required',
            'quarter_one_end_date' => 'required',
            'quarter_two_start_date' => 'required',
            'quarter_two_end_date' => 'required',
            'quarter_three_start_date' => 'required',
            'quarter_three_end_date' => 'required',
            'quarter_four_start_date' => 'required',
            'quarter_four_end_date' => 'required',
            'division_id' => 'required',
        ]);


        Rollingplan::create($request->all());


        return redirect()->route('rollingplans.index')
            ->with('success','Rolling plan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rollingplan $rollingplan)
    {
        return view('rollingplans.show',compact('rollingplan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rollingplan $rollingplan)
    {
        $divisions = Division::all();

        $years = [];
        $current_year = date('Y');
        for ($year=$current_year-2; $year <= $current_year+1; $year++) $years[$year] = $year;

        return view('rollingplans.edit',compact('rollingplan','divisions','years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rollingplan $rollingplan)
    {
        request()->validate([
            'start_year' => 'required',
            'end_year' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'quarter_one_start_date' => 'required',
            'quarter_one_end_date' => 'required',
            'quarter_two_start_date' => 'required',
            'quarter_two_end_date' => 'required',
            'quarter_three_start_date' => 'required',
            'quarter_three_end_date' => 'required',
            'quarter_four_start_date' => 'required',
            'quarter_four_end_date' => 'required',
            'division_id' => 'required',
        ]);


        $rollingplan->update($request->all());


        return redirect()->route('rollingplans.index')
            ->with('success','Rolling plan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rollingplan $rollingplan)
    {
        $rollingplan->delete();


        return redirect()->route('rollingplans.index')
            ->with('success','Rolling plan deleted successfully');
    }
}
