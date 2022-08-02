<?php

namespace App\Http\Controllers;

use App\Category as AppCategory;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
   {

    $category = AppCategory::Latest()->paginate(10);
    return view('obat.index', compact('obat'))
    ->with('i', (request()->input('page',1) - 1) *10);
   
   }
   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = AppCategory::where('category_product', $request->category_product)->first();
        switch ($cek){
            case false;
            $request->validate([
            'category_product'=>'required'
        ]);

        AppCategory::create($request->all());
        return redirect()->route('pages.admin.category.index')
                        ->with('success','Berhasil Menyimpan !');
        break;
        default:
        return redirect()->back()->with('gagal','Gagal! Nama Sudah Ada');
        break;
        
    }

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
    public function edit(AppCategory $category)
    {
        return view('pages.admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppCategory $category)
    {
        $request->validate([
            'category_product'=>'required'
        ]);

        $category->update($request->all());
        return redirect()->route('pages.admin.category.index')
                        ->with('success','Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppCategory $category)
    {
        $category->delete();
        return redirect()->route('obat.index')
                        ->with('success','Berhasil Hapus !');
    }

}

