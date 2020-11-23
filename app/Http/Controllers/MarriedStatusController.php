<?php

namespace App\Http\Controllers;

use App\Models\MarriedStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MarriedStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $married_statuses = MarriedStatus::all();
        return view('married_statuses.indexMarriedStus',compact('married_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mrrid_stu=$request;
        $mrrid_stu['is_enable']=1;
        $mrrid_stu['created_by']=Auth::user()->id;
        $mrrid_stu['updated_by']=Auth::user()->id;
        MarriedStatus::create($mrrid_stu->all());
        return redirect()->route('marriedStatus.index')
            ->with('success', 'Married Status Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
