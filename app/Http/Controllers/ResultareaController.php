<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resultarea;

class ResultareaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:resultarea-list');
        $this->middleware('permission:resultarea-create', ['only' => ['create','store']]);
        $this->middleware('permission:resultarea-edit', ['only' => ['edit','update']]);


        $this->middleware('permission:resultarea-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $resultareas = Resultarea::latest()->paginate(10);
        return view('resultareas.index',compact('resultareas'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resultareas.create');
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
            'result_area' => 'required',
        ]);


        Resultarea::create($request->all());


        return redirect()->route('resultareas.index')
            ->with('success','Result area created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Resultarea $resultarea)
    {
        return view('resultareas.show',compact('resultarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Resultarea $resultarea)
    {
        return view('resultareas.edit',compact('resultarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resultarea $resultarea)
    {
        request()->validate([
            'result_area' => 'required',
        ]);


        $resultarea->update($request->all());


        return redirect()->route('resultareas.index')
            ->with('success','Result area updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resultarea $resultarea)
    {
        $resultarea->delete();


        return redirect()->route('resultareas.index')
            ->with('success','Result area deleted successfully');
    }
}
