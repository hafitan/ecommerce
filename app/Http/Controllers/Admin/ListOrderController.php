<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ListOrder;
use Illuminate\Http\Request;

class ListOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listOrder = Order::all();
        return view('admin.listOrder.index', compact('listOrder'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListOrder  $listOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ListOrder $listOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListOrder  $listOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ListOrder $listOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListOrder  $listOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListOrder $listOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListOrder  $listOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListOrder $listOrder)
    {
        //
    }
}
