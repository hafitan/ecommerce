<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contoller = Category::latest()->paginate(5);
    
        return view('admin.contoller.index',compact('controller'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}