<?php

namespace App\Http\Controllers;

use App\Mainactivity;
use App\Performanceindicator;
use App\Activityfunding;
use App\Expectedoutput;
use App\Annualworkplan;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MainactivityController extends Controller
{
    protected $rules =
        [
            'annualworkplan_id' => 'required',
            'resultarea_id' => 'required',
            'activity_name' => 'required',
            'quarter_one' => 'required',
            'quarter_two' => 'required',
            'quarter_three' => 'required',
            'quarter_four' => 'required',
            'cost_requirements' => 'required',
            'on_budget_amount' => 'required',
            'off_budget_amount' => 'required',
            'finding_gap' => 'required'
        ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainactivities = Mainactivity::all();

        return view('mainactivities.index', ['mainactivities' => $mainactivities]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
           return Response::json(array('errors' => $validator->getMessageBag()->toArray()));

        } else {

            //create the new activity for the work plan
            $mainactivity = new Mainactivity();

            $mainactivity->annualworkplan_id = $request->annualworkplan_id;
            $mainactivity->resultarea_id = $request->resultarea_id;
            $mainactivity->activity_name = $request->activity_name;
            $mainactivity->quarter_one = $request->quarter_one;
            $mainactivity->quarter_two = $request->quarter_two;
            $mainactivity->quarter_three = $request->quarter_three;
            $mainactivity->quarter_four = $request->quarter_four;
            $mainactivity->cost_requirements = $request->cost_requirements;
            $mainactivity->on_budget_amount = $request->on_budget_amount;
            $mainactivity->off_budget_amount = $request->off_budget_amount;
            $mainactivity->finding_gap = $request->finding_gap;
            $mainactivity->save();

            return response()->json($mainactivity);


        }
    }

    public function ajaxstore(Request $request)
    {

        $annualworkplan_id = $request->annualworkplan_id;
        $successmessage = '';
        $errormessage = '';

        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {

           $errormessage = 'Please enter all the required information';

        } else {

            $mainactivity = new Mainactivity();

            $mainactivity->annualworkplan_id = $request->annualworkplan_id;
            $mainactivity->resultarea_id = $request->resultarea_id;
            $mainactivity->activity_name = $request->activity_name;
            $mainactivity->quarter_one = $request->quarter_one;
            $mainactivity->quarter_two = $request->quarter_two;
            $mainactivity->quarter_three = $request->quarter_three;
            $mainactivity->quarter_four = $request->quarter_four;
            $mainactivity->cost_requirements = $request->cost_requirements;
            $mainactivity->on_budget_amount = $request->on_budget_amount;
            $mainactivity->off_budget_amount = $request->off_budget_amount;
            $mainactivity->finding_gap = $request->finding_gap;
            $mainactivity->save();

            //add outputs for the activity

            $expectedoutput = new Expectedoutput();
            $expectedoutput->output = $request->target_output;
            $expectedoutput->mainactivity_id = $mainactivity->id;
            $expectedoutput->save();

            //add indicators for the output

            $performanceindicator = new Performanceindicator();
            $performanceindicator->indicator = $request->indicator;
            $performanceindicator->target_output = $request->target_output;
            $performanceindicator->means_of_verification = $request->means_of_verification;
            $performanceindicator->expectedoutput_id = $expectedoutput->id;
            $performanceindicator->save();


            //add the activity funding
            $fundings = $request->input('source_of_funding');

            foreach ($fundings as $key=>$funding) {
                Activityfunding::create(['sourceoffunding_id' => $funding, 'mainactivity_id' => $mainactivity->id]);
            }

            $successmessage = 'Activity added successfully.';


        }


        $mainactivities = Mainactivity::where('annualworkplan_id', $annualworkplan_id)->get();
        $annualworkplan = Annualworkplan::find($annualworkplan_id);

        return view('annualworkplans.activities',compact('mainactivities','annualworkplan', 'successmessage', 'errormessage'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mainactivity = Mainactivity::findOrFail($id);

        return view('mainactivities.show', ['mainactivity' => $mainactivity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $validator = Validator::make(Input::all(),$this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

            $mainactivity = Mainactivity::findOrFail($id);

            $mainactivity->annualworkplan_id = $request->annualworkplan_id;
            $mainactivity->resultarea_id = $request->resultarea_id;
            $mainactivity->activity_name = $request->activity_name;
            $mainactivity->quarter_one = $request->quarter_one;
            $mainactivity->quarter_two = $request->quarter_two;
            $mainactivity->quarter_three = $request->quarter_three;
            $mainactivity->quarter_four = $request->quarter_four;
            $mainactivity->cost_requirements = $request->cost_requirements;
            $mainactivity->on_budget_amount = $request->on_budget_amount;
            $mainactivity->off_budget_amount = $request->off_budget_amount;
            $mainactivity->finding_gap = $request->finding_gap;

            $mainactivity->save();

            return response()->json($mainactivity);

        }
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
        $outputs = Expectedoutput::where("mainactivity_id",$id)->get();

        $select = '<select name="expectedoutput_id" id="expectedoutput_id" class="form-control" required="required" >';

        $select .= '<option value="">Select Output</option>';
        foreach ($outputs as $output):

            $select .= '<option value="'.$output->id.'">'.$output->output.'</option>';

        endforeach;
        $select .= '</select>';


        print $select;
    }
}
