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
        // dd($product);
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

            // ddd($request->all());
            $this->validate($request, [
                'name' => 'required|unique:product,name,id',
                'stock' => 'required',
                'price' => 'required',
                'category' => 'required',
                'image' => 'required|image',
                'desc' => 'required'
            ]);
            // dd($this);
             //upload image
        $image = $request->file('image');
        // dd($image->getClientOriginalName());
        $image->move('public/image', $image->getClientOriginalName());

        $coba = [
            'name' => $request->name,
            'price' => $request->price,
        ];
        $cek = Product::where($coba)->first();
        if($cek == NULL){
            Product::create([
                'image'     => $image->getClientOriginalName(),
                'name'     => $request->name,
                'stock'   => $request->stock,
                'price'   => $request->price,
                'category'   => $request->category,
                'desc' => $request->desc
            ]);
        }else{
            $cek->stock += $request->stock;
            $cek->price = $request->price;
            $cek->image = $request->image;
            $cek->desc = $request->desc;
            $cek->save();
        }
            return redirect()->route('product.index')->with('success', 'Berhasil menambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // dd($request->all());
        $this->validate($request ,[
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image'     => 'image|mimes:png,jpg,jpeg',
            'desc' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'category' => $request->category,
            'desc' => $request->desc
        ];
        //upload image
        if ($request->image) {
            $image = $request->file('image');
            // dd($image->getClientOriginalName());
            $image->move('public/image', $image->getClientOriginalName());
            $data['image'] = $image->getClientOriginalName();
        }

        $upload = $product->update($data);
        if($upload){
            //redirect dengan pesan sukses
            return redirect()->route('product.index')->with(['success' => 'Data Berhasil Diubah!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('product.index')->with(['error' => 'Data Gagal Diubah!']);
        }
        return redirect()->route('product.index');
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
        return redirect()->route('product.index')
            ->with('success' , 'Data berhasil dihapus!!');
    }

    public function restock(Request $request)
    {
        $barang = Product::find($request->id);
        $barang->stock += $request->stock;
        $barang->save();
        return redirect()->route('product.index')->with('success', 'berhasil manembah stock');
    }

}
