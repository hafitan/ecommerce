<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        $category = Category::all();
        $product = Product::all();
        return view('admin.order.index', compact('order', 'category', 'product'));
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
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'date' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);
        $barang = Product::find($request->product_id);
        // dd($barang);
        if($request->qty > $barang->stock){
            return redirect()->back()->with('danger', 'qty tidak cukup');
        }

        //upload image
        $image = $request->file('image');
        // dd($image->getClientOriginalName());
        $image->move('public/image', $image->getClientOriginalName());
        // dd($barang);

        // $cek = Order::where('name', $request->name)->first();
            Order::create([
                'image'     => $image->getClientOriginalName(),
                'name'     => $barang->name,
                'qty'   => $request->qty,
                'price'   => $request->qty * $barang->price,
                'category_id'   => $request->category,
                'date' => Carbon::now(),
                'status' => $request->status,
            ]);
            $barang->stock -= $request->qty;
            $barang->save();

            return redirect()->route('order.index')->with('success', 'pembelian berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
