<?php

namespace App\Http\Controllers;

use App\Models\FeesMaster;
use Illuminate\Http\Request;

class FeesMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $feesmaster = FeesMaster::all();
       return view('fees.master.index',compact('feesmaster'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FeesMaster $feesMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeesMaster $feesMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeesMaster $feesMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeesMaster $feesMaster)
    {
        //
    }
}
