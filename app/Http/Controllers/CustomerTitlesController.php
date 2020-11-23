<?php

namespace App\Http\Controllers;
use App\Models\CutomerTitle;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class CustomerTitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cust_titls = CutomerTitle::all();
        return view('cutomer_titles.indexCustTitl',compact('cust_titls'));
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
        $cust_titl=$request;
        $cust_titl['is_enable']=1;
        $cust_titl['created_by']=Auth::user()->id;
        $cust_titl['updated_by']=Auth::user()->id;
        CutomerTitle::create($cust_titl->all());
        return redirect()->route('cutomerTitle.index')
            ->with('success', 'Customer Title Created Successfully.');
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
