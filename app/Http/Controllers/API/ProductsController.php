<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::where('estatus', '=','1')->get();
        return response()->json(['data' => $products, 'message' => 'fakin goat 🐐'], 200);
        //return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // $validator = Validator::make($request->all(),[
        //     'name' => 'required|unique:products,name|max:20',
        //     'age' => 'required|numeric',
        //     'password' => 'required|min:7|confirmed'
        // ]);
        // if ($validator->fails()) {
        //     // Return errors or redirect back with errors
        //     // return $validator->errors();
        //     return response()->json(['data'=> $validator->errors(), 'message'=> "Wupsi, that doesn't suppost to happen."], 422);

        // }
 
        // Retrieve the validated input...
       // $validated = $validator->validated();

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->image2 = $request->image2;
        $product->image3 = $request->image3;
        $product->status = 1;
        //$product->prooviderId = $request->prooviderId;
        $product->save();
        return response()->json(['product'=> $product]);

       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::where('id','=', $id)->first();
        return response()->json(['product'=> $product]);
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
    public function update(Request $request, $id)
    {
        //
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->image2 = $request->image2;
        $product->image3 = $request->image3;
        $product->status = 1;
        //$product->prooviderId = $request->prooviderId;
        $product->save();
        return response()->json(['product'=> $product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->status = 0;
        $product->save();
        return response()->json(['product'=> $product]);
    }
}
