<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\controller;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $carts = [];
        $cart = [];
        $order = Order::all();
        $category = Category::all();
        $product = Product::all();
        // $request->session()->forget('cart');

        if($request->session()->has('cart')){
			$cart = $request->session()->get('cart');
            // $total = Product::where('price'  * $request->qty);
		}
        $carts = Product::whereIn('id', $cart)->get();
        // dd($carts);
        return view('admin.order.index', compact('order', 'category', 'product', 'carts'));
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
        // $request->validate([
        //     'name' => 'required',
        //     'qty' => 'required',
        //     'price' => 'required',
        //     'category' => 'required',
        //     'date' => 'required',
        //     'status' => 'required',
        // ]);
        // $barang = Product::find($request->product_id);
        // dd($barang);
        // if($request->qty > $barang->stock){
        //     return redirect()->back()->with('danger', 'stock tidak cukup');
        // }

        //     Order::create([
        //         'name'     => $barang->name,
        //         'qty'   => $request->qty,
        //         'price' => $barang->price,
        //         'total' => $request->qty * $barang->price,
        //         'category'   => $request->category,
        //         'date' => Carbon::now(),
        //         'status' => $request->status,
        //     ]);
        //     $barang->stock -= $request->qty;
        //     $barang->save();

        //     return redirect()->route('admin.order.index')->with('success', 'pembelian berhasil');

        // if (empty($_POST['name'])) {
        //     $errors['name'] = 'Name is required.';
        // }

        // if (empty($_POST['email'])) {
        //     $errors['email'] = 'Email is required.';
        // }

        // if (empty($_POST['superheroAlias'])) {
        //     $errors['superheroAlias'] = 'Superhero alias is required.';
        // }

        // if (!empty($errors)) {
        //     $data['success'] = false;
        //     $data['errors'] = $errors;
        // } else {
        //     $data['success'] = true;
        //     $data['message'] = 'Success!';
        // }

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
        $order->delete();
        return redirect()->route('order.index')->with('success', 'berhasil hapus');
    }

    public function reorder(Request $request) {
        $input = $request->all();
        // dd($input['id']);
        $cart = [];
        if($request->session()->has('cart')){
			$cart = $request->session()->get('cart');
		}
        // dd($cart);
        $cart[] = $input['id'];
        $request->session()->put('cart', $cart);


        Log::info($input);
        return response()->json(['success'=>'Got Simple Ajax Request.']);
}

}

