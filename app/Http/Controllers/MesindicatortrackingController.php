<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mesindicatortracking;
use App\Mesindicatortracingindicator;
use App\County;
use App\Indicatorcategory;
use App\Mesindicator;
use App\Rollingplan;
use DB;

class MesindicatortrackingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ministry-list');
        $this->middleware('permission:ministry-create', ['only' => ['create','store']]);
        $this->middleware('permission:ministry-edit', ['only' => ['edit','update']]);


        $this->middleware('permission:ministry-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesindicatortrackings = Mesindicatortracking::latest()->paginate(10);
        return view('mesindicatortrackings.index',compact('mesindicatortrackings'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = [];
        $current_year = date('Y');
        for ($year=$current_year-2; $year <= $current_year+1; $year++) $years[$year] = $year;

        $counties = County::all();
        $indicatorcategories = Indicatorcategory::all();
        $rollingplans = Rollingplan::all();
        $user_id = \Auth::id();


        return view('mesindicatortrackings.create',compact('counties', 'indicatorcategories', 'rollingplans', 'years','user_id'));
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
            'reporting_date' => 'required',
            'rollingplan_id' => 'required',
            'quarter' => 'required',
            'county_id' => 'required',
            'indicatorcategory_id' => 'required',
        ]);

        $mesindicatortracking = Mesindicatortracking::create([
            'reporting_date' => $request->reporting_date,
            'rollingplan_id'=>$request->rollingplan_id,
            'quarter'=>$request->quarter,
            'county_id'=>$request->county_id,
            'indicatorcategory_id'=>$request->indicatorcategory_id,
            'user_id'=>$request->user_id
        ]);

        $mesindicatortracking_id = $mesindicatortracking->id;


        $input = $request->all();


        for($i=0; $i<= count($input['mesindicator_id'])-1; $i++) {

           $insert[] = [
                'county_value' => $input['county_value'][$i],
                'subcounty_value' => $input['subcounty_value'][$i],
                'mesindicatortracking_id' => $mesindicatortracking_id,
                'mesindicator_id' => $input['mesindicator_id'][$i],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];


        }

        if(!empty($insert)){

            DB::table('mesindicatortracking_mesindicator')->insert($insert);
        }

        return redirect()->route('mesindicatortrackings.index')
            ->with('success','Indicators reported successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mesindicatortracking $mesindicatortracking)
    {
        $years = [];
        $current_year = date('Y');
        for ($year=$current_year-2; $year <= $current_year+1; $year++) $years[$year] = $year;

        $counties = County::all();
        $indicatorcategories = Indicatorcategory::all();
        $rollingplans = Rollingplan::all();
        $trackedindicators = Mesindicatortracingindicator::where('mesindicatortracking_id', $mesindicatortracking->id)->get();

        return view('mesindicatortrackings.show',compact('counties', 'indicatorcategories', 'rollingplans', 'years','mesindicatortracking','trackedindicators'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesindicatortracking $mesindicatortracking)
    {
        $years = [];
        $current_year = date('Y');
        for ($year=$current_year-2; $year <= $current_year+1; $year++) $years[$year] = $year;

        $counties = County::all();
        $indicatorcategories = Indicatorcategory::all();
        $rollingplans = Rollingplan::all();
        $trackedindicators = Mesindicatortracingindicator::where('mesindicatortracking_id', $mesindicatortracking->id)->get();


        return view('mesindicatortrackings.edit',compact('counties', 'indicatorcategories', 'rollingplans', 'years','mesindicatortracking','trackedindicators'));
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
        $input = $request->all();

        for($i=0; $i<= count($input['id'])-1; $i++) {

            Mesindicatortracingindicator::where('id', '=', $input['id'][$i])
                ->update([
                    'county_value' => $input['county_value'][$i],
                    'subcounty_value' => $input['subcounty_value'][$i],
                    'mesindicatortracking_id' => $id,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);


        }



        return redirect()->route('mesindicatortrackings.index')
            ->with('success','Report updated successfully');

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


    public function getIndicators($indicatorcategory_id)
    {

        $whereData = [
            ['indicatorcategory_id', $indicatorcategory_id]
        ];


        $mesindicators = Mesindicator::where($whereData)->get();

        $indicatorcategory = Indicatorcategory::find($indicatorcategory_id);
        $indicatortable = '<h2>'.$indicatorcategory->category.' Indicators</h2>';

        $indicatortable .= '<table class="table table-striped">';

        $indicatortable .= ' <thead>
                                            <tr>
                                                <th>Indicator</th>
                                                <th>County Value</th>
                                                <th>Sub-county Value</th>
                                            </tr>
                                            </thead>';


        foreach ($mesindicators as $mesindicator):

            $indicatortable .= '<tr><td>'.$mesindicator->indicator_name.'</td><td><input type="hidden" name="mesindicator_id[]" value="'.$mesindicator->id.'"><input type="text" name="county_value[]" class="form-control"></td><td><input type="text" name="subcounty_value[]" class="form-control"></td></tr>';


        endforeach;

        $indicatortable .= '</table>';



        print $indicatortable;


    }
}
