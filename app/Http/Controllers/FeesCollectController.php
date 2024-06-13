<?php

namespace App\Http\Controllers;

use App\Models\FeesCollect;
use Illuminate\Http\Request;

class FeesCollectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fees.collect.index');
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
    public function show(FeesCollect $feesCollect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeesCollect $feesCollect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeesCollect $feesCollect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeesCollect $feesCollect)
    {
        //
    }
}
