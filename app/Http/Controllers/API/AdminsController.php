<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminsController extends Controller
{
    public function index()
    {
    
        $admins = Admin::where('status', '=','1')->get();
        if ($admins->isEmpty()) {
            return response()->json(['data' => $admins, 'message' => 'No hay admins disponibles.'], 200);
        }
        return response()->json(['data' => $admins, 'message' => 'Aqui estan los admins 🐐'], 200);
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->lastname = $request->lastname;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->address = $request->address;
        $admin->status = 1;
        $admin->role = $request->role;
        $admin->save();

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->extension();
            $imgName = 'admin_'.$admin->id.$ext;
            $path= $img->storeAs('imgs/admin', $imgName, 'public');
            $admin->picture = asset('storage/'.$path);
            $admin->save();

        }
      
        return response()->json(['admin'=> $admin, 'message' => 'Admin agregado correctamente.'], 200);

       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $admin = Admin::where('id','=', $id)->first();
        return response()->json(['admin'=> $admin]);
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
        
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['message' => 'Admin no encontrado.'], 404);
        }
    
        // Actualizar solo los campos presentes en la solicitud
        if ($request->has('name')) {
            $admin->name = $request->name;
        }
        if ($request->has('lastname')) {
            $admin->lastname = $request->lastname;
        }
        if ($request->has('email')) {
            $admin->email = $request->email;
        }
        if ($request->has('password')) {
            $admin->password = $request->password;
        }
        if ($request->has('address')) {
            $admin->address = $request->address;
        }
        if ($request->has('status')) {
            $admin->status = $request->status;
        }
        if ($request->has('role')) {
            $admin->role = $request->role;
        }
    
        // Guardar cambios en la base de datos
        $admin->save();
    
        // Manejar la actualización de la imagen si se proporciona
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->extension();
            $imgName = 'admin_'.$admin->id.'.'.$ext;
            $path = $img->storeAs('imgs/admin', $imgName, 'public');
            $admin->picture = asset('storage/'.$path);
            $admin->save();
        }
    
        return response()->json(['admin' => $admin, 'message' => 'Admin actualizado correctamente.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $admin = Admin::find($id);
        if ($admin == null) return response()->json(['message' => 'Admin no encontrado.'], 404);
        $admin->status = 0;
        $admin->save();
        return response()->json(['admin'=> $admin]);
    }
}
