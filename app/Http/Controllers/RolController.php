<?php

namespace App\Http\Controllers;

use App\Models\rol;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
// use App\Http\Resources\Rol as RolResource;
use Validator;

class RolController extends Controller
{
  /* -- Obtener los datos del usuario logeado -- */
      // public function __construct()
      // {
      //     $this->middleware('auth');
      // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response()->json(rol::whereestado(true)->orderby('id')->get());
      // $rol = rol::all();
      // return response()->json(RolResource::collection($rol));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'nombre' => 'required|string',
          'superadmin' => 'required|boolean',
      ]);      
      try {
          $id = Auth::user()->id;
       } catch (Exception $e) {
           return response()->json(['error' => $e->getMessage()], 500);
       }
      $request->request->add(['estado' => true]);
      $request->request->add(['iduser' => $id]);
      // return response()->json([$request->all(),201]);
      $rolcreate = rol::create($request->all());
       return response()->json(['message' => 'El rol se grabo correctamente!!', 'rol' => $rolcreate],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $rol = rol::find($id);
       if (!$rol) {
           return response()->json([
               'success' => false,
               'message' => 'No se encontro el Rol'], 404);
       }
       return response()->json([
           'success' => true,
           'data' => $rol->toArray()], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(rol $rol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $rol=rol::find($id);
  		// Si no existe ese rol devolvemos un error.
  		if (!$rol)
  		{
  			// Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
  			return response()->json(["errors"=>array(["code"=>404,"message"=>"No se encuentra el Rol con ese código."])],404);
  		}
      $request->validate([
        "nombre"      => "required|string",
        "superadmin"  => "required|boolean",
        "estado"      => "required|boolean",
      ]);
      $rol->nombre      = $request["nombre"];
      $rol->superadmin  = $request["superadmin"];
      $rol->estado      = $request["estado"];
      $rol->iduser      = Auth::user()->id;
      $rol->save();
      return response()->json(["success" => true,
                               "message" => "Rol actualizado correctamente."],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $rol = rol::find($id);
       if (!$rol) {
           return response()->json([
               "success" => false,
               "message" => "No se encontro el Rol"], 404);
       }
       $rol->delete();
       // Se usa el código 204 No Content – [Sin Contenido] Respuesta a una petición exitosa que no devuelve un body (como una petición DELETE)
       return response()->json(["code"=>204,"message"=>"Se ha eliminado el Rol correctamente."],404);
    }
}
