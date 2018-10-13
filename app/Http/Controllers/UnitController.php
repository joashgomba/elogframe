<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Division;
use App\Annualworkplan;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:unit-list');
        $this->middleware('permission:unit-create', ['only' => ['create','store']]);
        $this->middleware('permission:unit-edit', ['only' => ['edit','update']]);


        $this->middleware('permission:unit-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $units = Unit::latest()->paginate(5);
        return view('units.index',compact('units'))
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
        return view('units.create',compact('divisions'));
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
            'unit_name' => 'required',
            'division_id' => 'required',
        ]);


        Unit::create($request->all());


        return redirect()->route('units.index')
            ->with('success','Unit created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return view('units.show',compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $divisions = Division::all();

        return view('units.edit',compact('unit','divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        request()->validate([
            'unit_name' => 'required',
            'division_id' => 'required',
        ]);


        $unit->update($request->all());


        return redirect()->route('units.index')
            ->with('success','Unit updated successfully');
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


        return redirect()->route('units.index')
            ->with('success','Unit deleted successfully');
    }

    public function getWorkplans($unit_id,$rollingplan_id)
    {
        /**
        $whereData = [
            ['name', 'test'],
            ['id', '<>', '5']
        ];
         **/
        $whereData = [
        ['unit_id', $unit_id],
        ['rollingplan_id', $rollingplan_id]
        ];


        $annualworkplans = Annualworkplan::where($whereData)->get();

        $workplanselect = '<select name="annualworkplan_id" id="annualworkplan_id" class="form-control" required="required" onChange="getActivities()">';

        $workplanselect .= '<option value="0">Select Work Plan Period</option>';
        foreach ($annualworkplans as $annualworkplan):

            $workplanselect .= '<option value="'.$annualworkplan->id.'">'.$annualworkplan->unit->unit_name.' Work Plan ('.$annualworkplan->rollingplan->start_year.'/'.$annualworkplan->rollingplan->end_year.')</option>';

        endforeach;
        $workplanselect .= '</select>';


        print $workplanselect;


    }
}
