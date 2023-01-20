<?php

namespace App\Http\Controllers;

use App\Models\PendingMonthlyPurchase;
use App\Http\Requests\StorePendingMonthlyPurchaseRequest;
use App\Http\Requests\UpdatePendingMonthlyPurchaseRequest;

class PendingMonthlyPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePendingMonthlyPurchaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendingMonthlyPurchaseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PendingMonthlyPurchase  $pendingMonthlyPurchase
     * @return \Illuminate\Http\Response
     */
    public function show(PendingMonthlyPurchase $pendingMonthlyPurchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PendingMonthlyPurchase  $pendingMonthlyPurchase
     * @return \Illuminate\Http\Response
     */
    public function edit(PendingMonthlyPurchase $pendingMonthlyPurchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendingMonthlyPurchaseRequest  $request
     * @param  \App\Models\PendingMonthlyPurchase  $pendingMonthlyPurchase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendingMonthlyPurchaseRequest $request, PendingMonthlyPurchase $pendingMonthlyPurchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PendingMonthlyPurchase  $pendingMonthlyPurchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendingMonthlyPurchase $pendingMonthlyPurchase)
    {
        //
    }
}
