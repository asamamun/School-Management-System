<?php

namespace App\Http\Controllers;

use App\Models\FeesType;
use Illuminate\Http\Request;

class FeesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fees.type.index');
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
    public function show(FeesType $feesType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeesType $feesType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeesType $feesType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeesType $feesType)
    {
        //
    }
}
