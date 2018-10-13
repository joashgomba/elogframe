<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicatorcategory;

class IndicatorcategoryController extends Controller
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
        $indicatorcategories = Indicatorcategory::latest()->paginate(5);
        return view('indicatorcategories.index',compact('indicatorcategories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('indicatorcategories.create');
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
            'category' => 'required',
        ]);


        Indicatorcategory::create($request->all());


        return redirect()->route('indicatorcategories.index')
            ->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Indicatorcategory $indicatorcategory)
    {
        return view('indicatorcategories.show',compact('indicatorcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Indicatorcategory $indicatorcategory)
    {
        return view('indicatorcategories.edit',compact('indicatorcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indicatorcategory $indicatorcategory)
    {
        request()->validate([
            'category' => 'required',
        ]);


        $indicatorcategory->update($request->all());


        return redirect()->route('indicatorcategories.index')
            ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indicatorcategory $indicatorcategory)
    {
        $indicatorcategory->delete();


        return redirect()->route('indicatorcategories.index')
            ->with('success','Category deleted successfully');
    }
}
