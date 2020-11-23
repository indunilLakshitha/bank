<?php

namespace App\Http\Controllers;

use App\Models\CustomerStatusDates;
use App\Models\CutomerStatus;
use App\Models\StatusData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CustomerStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cust_staus = CutomerStatus::all();
        return view('cutomer_statuses.indexCustStus',compact('cust_staus'));
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
        $cust_stus=$request;
        $cust_stus['is_enable']=1;
        $cust_stus['created_by']=Auth::user()->id;
        $cust_stus['updated_by']=Auth::user()->id;
        CutomerStatus::create($cust_stus->all());
        return redirect()->route('cutomerStatus.index')
            ->with('success', 'Customer Status Created Successfully.');
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
