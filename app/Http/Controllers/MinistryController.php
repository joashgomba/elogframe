<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministry;

class MinistryController extends Controller
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
        $ministries = Ministry::latest()->paginate(5);
        return view('ministries.index',compact('ministries'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ministries.create');
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
            'name' => 'required',
            'location' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'postal_address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
        ]);


        Ministry::create($request->all());


        return redirect()->route('ministries.index')
            ->with('success','Ministry created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ministry $ministry)
    {
        return view('ministries.show',compact('ministry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ministry $ministry)
    {
        return view('ministries.edit',compact('ministry'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ministry $ministry)
    {
        request()->validate([
            'name' => 'required',
            'location' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'postal_address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
        ]);


        $ministry->update($request->all());


        return redirect()->route('ministries.index')
            ->with('success','Ministry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ministry $ministry)
    {
        $ministry->delete();


        return redirect()->route('ministries.index')
            ->with('success','Ministry deleted successfully');
    }
}
