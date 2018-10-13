<?php

namespace App\Http\Controllers;

use App\Sourceoffunding;
use Illuminate\Http\Request;

class SourceoffundingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:sourceoffunding-list');
        $this->middleware('permission:sourceoffunding-create', ['only' => ['create','store']]);
        $this->middleware('permission:sourceoffunding-edit', ['only' => ['edit','update']]);


        $this->middleware('permission:sourceoffunding-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sourcesoffunding = Sourceoffunding::latest()->paginate(10);
        return view('sourcesoffunding.index',compact('sourcesoffunding'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('sourcesoffunding.create');
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
            'fund_name' => 'required',
        ]);


        Sourceoffunding::create($request->all());


        return redirect()->route('sourcesoffunding.index')
            ->with('success','Source of funding created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sourceoffunding = Sourceoffunding::find($id);
        return view('sourcesoffunding.show',compact('sourceoffunding'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sourceoffunding = Sourceoffunding::find($id);
       return view('sourcesoffunding.edit',compact('sourceoffunding'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sourceoffunding $sourceoffunding)
    {
        request()->validate([
            'fund_name' => 'required',
        ]);


        $sourceoffunding->update($request->all());


        return redirect()->route('sourcesoffunding.index')
            ->with('success','Source of funding updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sourceoffunding $sourceoffunding)
    {
        $sourceoffunding->delete();


        return redirect()->route('sourcesoffunding.index')
            ->with('success','Source of funding deleted successfully');
    }
}
