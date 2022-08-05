<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Restock;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        return view('admin.product.index' , compact('product' , 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'qty' => 'required',
        ]);

        Restock::create($request->all());
        return redirect()->route('admin.product.index')
        ->with('success' , 'Data berhasil ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = Product::where('name' , $request->name)->where('category', $request->category)->first();
        switch($cek){
            case false:
                $request->validate([
                    'name' => 'required',
                    'stock' => 'required',
                    'price' => 'required',
                    'category' => 'required'
                ]);

                 
        Product::create($request->all());
        return redirect()->route('admin.product.index')
        ->with('success' , 'Data berhasil ditambah');
        
        break;

        default:
        return redirect()->back()->with('danger' , 'Data sudah ada');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       
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
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')
            ->with('success' , 'Data berhasil dihapus!!');
    }
    
}
