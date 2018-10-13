<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\County;

class CountyController extends Controller
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
        $counties = County::latest()->paginate(10);
        return view('counties.index',compact('counties'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('counties.create');
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
            'county' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ]);


        County::create($request->all());


        return redirect()->route('counties.index')
            ->with('success','County created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(County $county)
    {
        return view('counties.show',compact('county'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(County $county)
    {
        return view('counties.edit',compact('county'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, County $county)
    {
        request()->validate([
            'county' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ]);

        $county->update($request->all());


        return redirect()->route('counties.index')
            ->with('success','County updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(County $county)
    {
        $county->delete();


        return redirect()->route('counties.index')
            ->with('success','County deleted successfully');
    }
}
