<?php

namespace App\Http\Controllers;

use App\Models\FeesAssign;
use Illuminate\Http\Request;

class FeesAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feesassigns = FeesAssign::with(['standard', 'student'])->paginate(10);
        return view('fees.assign.index', compact('feesassigns'));
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
    public function show(FeesAssign $feesAssign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeesAssign $feesAssign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeesAssign $feesAssign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeesAssign $feesAssign)
    {
        //
    }
}