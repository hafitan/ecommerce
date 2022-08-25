<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Chart;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Cart;
use Carbon\Carbon;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.shop.index' , compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $request->validate([
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'category' => 'required',
            'total' => 'required',
            'date' => 'required',
            'status' => 'required'

        ]);
        $product = Product::find($request->product_id);
        // dd($product);
        if($request->qty > $product->stock){
            return redirect()->back()->with('danger', 'qty tidak cukup');
        }

        Order::create([
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'category' => $request->category,
            'total' => $request->qty * $product->price,
            'date' => Carbon::Today(),
            'status' => $request->status


        ]);

        return redirect()->route('admin.shop.index')
    ->with('success','Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function single($id)
    {
    $product = Product::find($id);
    // dd($product);
    $play = Product::all();

    return view('admin.shop.single' , compact('product' , 'play'));

    }

    public function chart(Request $request){
        // $request->validate([
        //     'name' => 'required',
        //     'qty' => 'required',
        //     'price' => 'required',
        //     'category' => 'required',
        //     'total' => 'required',
        //     'date' => 'required',
        //     'status' => 'required'

        // $barang = Product::find($request->product_id);

        Order::create([
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'category' => $request->category,
            'total' => $request->qty * $request->price,
            'date' => Carbon::Today(),
            'status' => $request->status
        ]);
        // $barang->stock -= $request->qty;
        // $barang->save();

        return redirect()->route('shop.index')
    ->with('success','Berhasil Menyimpan !');
    }

    public function keranjang(Request $request){

        Chart::create([
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'image' => $request->image,
            'category' => $request->category,
            'total' => $request->qty * $request->price,
            'date' => Carbon::Today(),
            'status' => $request->status
        ]);
        return redirect()->route('shop.index')
    ->with('success','Berhasil Menambahkan Ke Cart !');
    }

    public function bCheckout(Request $request){

        $shipping = Shipping::all();
        $payment = Payment::all();

        $result = Chart::create([
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'category' => $request->category,
            'total' => $request->qty * $request->price,
            'date' => Carbon::Today(),
            'status' => $request->status
       ]);

       return redirect()->route('checkout', $result->id);
        // return view('admin.shop.checkout' , compact('product'));
    }

    public function checkout($id){
        $product = Chart::find($id);
        return view('admin.shop.checkout' , compact('product'));
    }
    public function buy(Request $request){

            order::create([
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'category' => $request->category,
            'total' => $request->qty * $request->price,
            'date' => Carbon::Today(),
            'shipping' => $request->shipping,
            'payment' => $request->payment,
            'status' => $request->status,
            'adress' => $request->adress,
            'note' => $request->note
            ]);

            return redirect()->route('shop.index')->
                with('success' , 'Berhasil menyelesaikan order');
    }
    public function cart(){
        // $cartItems = \Cart::getContent();
        $cart = Chart::all();
        return view('admin.shop.cart', compact('cart'));
    }
    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'category' => $request->category,
            'qty' => $request->qty,
            'date' => $request->date,
            'price' => $request->price,
            'total' => $request->total,
            'status' => $request->status,
            'image' => $request->image,
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('cart');
    }
    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'qty' => [
                    'relative' => false,
                    'value' => $request->qty
                ],
            ]
        );
        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }
    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart');
    }
    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart');
    }
}
