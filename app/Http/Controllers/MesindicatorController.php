<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mesindicator;
use App\Indicatorcategory;

class MesindicatorController extends Controller
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
        $mesindicators = Mesindicator::latest()->paginate(10);
        return view('mesindicators.index',compact('mesindicators'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indicatorcategories = Indicatorcategory::all();
        return view('mesindicators.create',compact('indicatorcategories'));
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
            'indicator_name' => 'required',
            'indicatorcategory_id' => 'required',
        ]);


        Mesindicator::create($request->all());


        return redirect()->route('mesindicators.index')
            ->with('success','Indicator created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mesindicator $mesindicator)
    {
        return view('mesindicators.show',compact('mesindicator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesindicator $mesindicator)
    {
        $indicatorcategories = Indicatorcategory::all();

        return view('mesindicators.edit',compact('mesindicator','indicatorcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesindicator $mesindicator)
    {
        request()->validate([
            'indicator_name' => 'required',
            'indicatorcategory_id' => 'required',
        ]);


        $mesindicator->update($request->all());


        return redirect()->route('mesindicators.index')
            ->with('success','Indicator updated successfully');
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
}
