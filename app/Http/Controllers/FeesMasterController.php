<?php

namespace App\Http\Controllers;

use App\Models\FeesGroup;
use App\Models\FeesMaster;
use App\Models\FeesType;
use Illuminate\Http\Request;

class FeesMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feesmasters = FeesMaster::with('feesGroup', 'feesType')->get();
        return view('fees.master.index', compact('feesmasters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $feesgroups = FeesGroup::all();
        $feestypes = FeesType::all();
        return view('fees.master.create', compact('feesgroups', 'feestypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fees_group_id' => 'required',
            'fees_type_id' => 'required',
            'duedate' => 'required',
            'amount' => 'required',
            'fine_type' => 'required',
            'fine_amount' => 'required',
            'fine_percentage' => 'required',
            'status' => 'required',
        ]);

        $feesmaster = new FeesMaster();
        $feesmaster->fees_group_id = $request->fees_group_id;
        $feesmaster->fees_type_id = $request->fees_type_id;
        $feesmaster->duedate = $request->duedate;
        $feesmaster->amount = $request->amount;
        $feesmaster->fine_type = $request->fine_type;
        $feesmaster->fine_amount = $request->fine_amount;
        $feesmaster->fine_percentage = $request->fine_percentage;
        $feesmaster->status = $request->status;
        $feesmaster->save();

        return redirect()->route('feemasters.index')->with('success', 'Fees Master Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(FeesMaster $feesMaster)
    {
        // dd($feesMaster);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeesMaster $feesMaster)
    {
        // dd($feesMaster);
        // Category::pluck('name', 'id');

        $feesgroups = FeesGroup::pluck('name', 'id');
        $feestypes = FeesType::pluck('name', 'id');
        return view('fees.master.edit', compact('feesMaster', 'feesgroups', 'feestypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeesMaster $feesMaster)
    {
        $request->validate([
            'fees_group_id' => 'required',
            'fees_type_id' => 'required',
            'duedate' => 'required',
            'amount' => 'required',
            'fine_type' => 'required',
            'fine_amount' => 'required',
            'fine_percentage' => 'required',
            'status' => 'required',
        ]);

        // $feesMaster->fees_group_id = $request->fees_group_id;
        // $feesMaster->fees_type_id = $request->fees_type_id;
        // $feesMaster->duedate = $request->duedate;
        // $feesMaster->amount = $request->amount;
        // $feesMaster->fine_type = $request->fine_type;
        // $feesMaster->fine_amount = $request->fine_amount;
        // $feesMaster->fine_percentage = $request->fine_percentage;
        // $feesMaster->status = $request->status;
        // $feesMaster->save();
        $feesMaster->update($request->all());

        return redirect()->route('feemasters.index')->with('success', 'Fees Master Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeesMaster $feesMaster)
    {
        $feesMaster->delete();
        return redirect()->route('feemasters.index')->with('success', 'Fees Master Deleted Successfully');
    }
}
