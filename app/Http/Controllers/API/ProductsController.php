<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Provider;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $products = Product::where('status', '=','1')->get();
        if ($products->isEmpty()) {
            return response()->json(['data' => $products, 'message' => 'No hay productos disponibles.'], 200);
        }
        return response()->json(['data' => $products, 'message' => 'Aqui estan los productos 🐐'], 200);
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['providers' => Provider::all()], 200);
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
        $product->stock = $request->stock;
        $product->status = 1;
        $product->providerId = $request->providerId;
        $product->save();

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->extension();
            $imgName = 'product_'.$product->id.'_1.'.$ext;
            $path= $img->storeAs('imgs/products', $imgName, 'public');
            $product->image = asset('storage/'.$path);
            $product->save();

        }
        if ($request->hasFile('image2')) {
            $img = $request->file('image2');
            $ext = $img->extension();
            $imgName = 'product_'.$product->id.'_2.'.$ext;
            $path= $img->storeAs('imgs/products', $imgName, 'public');
            $product->image2 = asset('storage/'.$path);
            $product->save();

        }
        if ($request->hasFile('image3')) {
            $img = $request->file('image3');
            $ext = $img->extension();
            $imgName = 'product_'.$product->id.'_3.'.$ext;
            $path= $img->storeAs('imgs/products', $imgName, 'public');
            $product->image3 = asset('storage/'.$path);
            $product->save();

        }

       
        
        
        return response()->json(['product'=> $product, 'message' => 'Producto agregado correctamente.'], 200);

       
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
