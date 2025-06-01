<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\BaseController;

class ProductApiController extends BaseController 
{

    public function index()
    {
        $data['products']= Product::all();
        return $this->sendResponse($data,'All Products Data');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
        $request->validate([
            "name" => "required",
            "detail" => "required",
            "image" => "required|mimes:jpg,jpeg,png"
        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/uploads/images/'), $imageName);
        }

      

        $product= Product::create([
             "name" => $request->name,
            "detail" => $request->detail,
            "image" => $imageName           
        ]);

        return $this->sendResponse($product,'product successfully created');
       
    }


    public function show(string $id)
    {
        $data['products'] = Product::select(
            'id',
            'name',
            'detail',
            'image'
        )->where(['id' => $id])->get();
  
        return $this->sendResponse($data,'Single Product');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $product = Product::findOrFail($id);
    $data['image'] = $product->image;

    $data = $request->validate([
        "name" => "required",
        "detail" => "required",
        "image" => "nullable|mimes:jpg,jpeg,png"
    ]);

    if ($request->hasFile('image')) {
      
        $oldImagePath = public_path('/uploads/images/' . $product->image);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/images/'), $imageName);
        $data['image'] = $imageName;
    }

    $product->update($data);


    return $this->sendResponse($product,'Product successfully updated');

}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
          if ($product->image) {
            $destination = 'uploads/images/' . $product->image;
            if (FILE::exists($destination)) {
                File::delete($destination);
            }
        }
        $product = Product::where('id',$id)->delete();

        return $this->sendResponse($product,'Product successfully deleted');

    }
}
