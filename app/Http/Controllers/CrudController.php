<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CrudController extends Controller
{
    public function index(){
        $data = Product::all();
        return view('index', compact('data'));
    }


    public function create(Request $request){
         $request->validate(
            [
                'name'=> 'required|unique:products',
            ],
            [
                'name.unique' => 'Product name exists in the database',
            ]
        );
        $data = new Product();
        $data->name = $request->name;
        $data->description = $request->description;
        $data->stock = $request->stock;
        $data->price = $request->price;
        $image = $request->image;
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $data->image = $imagename;    
        }

        $data->save();
        return redirect('/index');
    }



    public function edit(Request $request){
        $request->validate(
           [
             'name' => 'required|unique:products,name,' . $request->id, // Allow same name for current product
           ],
           [
               'name.unique' => 'Product name exists in the database',
           ]
       );
       $data = Product::find($request->id);
       $data->name = $request->name;
       $data->description = $request->description;
       $data->stock = $request->stock;
       $data->price = $request->price;
       $image = $request->image;
       if ($image) {
            // Delete old image if exists
            if ($data->image && file_exists(public_path('product/' . $data->image))) {
                unlink(public_path('product/' . $data->image));
            }

           $imagename = time().'.'.$image->getClientOriginalExtension();
           $request->image->move('product', $imagename);
           $data->image = $imagename;    
       }

       $data->save();
       return redirect('/index');
   }


   public function delete(Request $request){
    $product = Product::find($request->id);
    $product->delete();
    return redirect()->back();
   }


   public function display(Request $request, $id){
    $product = Product::find($id);
    return view('product', compact('product'));
   }
}
