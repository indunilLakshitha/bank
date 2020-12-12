<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        return view('branches.indexBranches', compact('branches'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([

            'branch_name' => 'required ',
            'branch_code' => 'required',

        ]);

        $branch = $request;
        $branch['is_enable'] = 1;
        $branch['created_by'] = Auth::user()->id;
        $branch['updated_by'] = Auth::user()->id;

        Branch::create($branch->all());
        return redirect()->route('branches.index')
            ->with('success', 'Branch created successfully.');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $branch = Branch::find($id);
        return view('branches.editBranch', compact('branch'));
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);
        $branch->branch_name = $request->input('branch_name');
        $branch->branch_code = $request->input('branch_code');
        $branch->save();
        return redirect('/branches')
            ->with('success', 'Branch updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        return redirect('/branches')->with('message' , 'Branch deleted!!');
    }
}
