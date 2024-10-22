<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $providers = Provider::where('status', '=','1')->get();
        if ($providers->isEmpty()) {
            return response()->json(['data' => $providers, 'message' => 'No hay proovedores disponibles.'], 200);
        }
        return response()->json(['data' => $providers, 'message' => 'Aqui estan los proovedores 🐐'], 200);
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return response()->json(['providers' => Provider::all()], 200);
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

        $provider = new Provider();
        $provider->name = $request->name;
        $provider->contact = $request->contact;
        $provider->status = 1;
        $provider->save();
        
        
        return response()->json(['product'=> $provider, 'message' => 'Proovedor agregado correctamente.'], 200);

       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $provider = Provider::where('id','=', $id)->first();
        return response()->json(['provider'=> $provider]);
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
        
        $provider = Provider::find($id);
        if ($provider == null) return response()->json(['message' => 'Proovedor no encontrado.'], 404);
        if ($request->name) {
            $provider->name = $request->name;
        }
        if ($request->contact) {
            $provider->contact = $request->contact;
        }

  
        $provider->save();

      
        return response()->json(['provider'=> $provider]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $provider = Provider::find($id);
        if ($provider == null) return response()->json(['message' => 'Proovedor no encontrado.'], 404);
        $provider->status = 0;
        $provider->save();
        return response()->json(['provider'=> $provider]);
    }
}
