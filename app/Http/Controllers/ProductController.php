<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use GrahamCampbell\ResultType\Success;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('products.index');
    }

    public function create(Request $request)
    {
        return view('products.create');
    }

    // public function store(Request $request)
    // {
          
    // }

    public function show($id)
    {
        $product = (object)['id' => $id];
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {

        return view('products.edit', compact(var_name: 'product'));
    }

    // public function update(Request $request)
    // {

    
    // }


    public function destroy(Product $product)
     {

     }

    public function import(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'file' => 'required|max:2048'
        ]);
         Excel::import(new ProductsImport, $request->file('file') );

         return back()->with('Success', 'successfully imported!');
       
    }

    public function export(){
        return Excel::download(new ProductsExport, 'exportProduct.xlsx');
    }
}
