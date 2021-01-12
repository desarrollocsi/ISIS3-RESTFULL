<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;
use App\Http\Resources\MenuResource;

use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(menu::whereestado(true)->orderby('id')->get());
        //
        // MenuResource::withoutWrapping();
        //
        // $Menu = menu::with('children2')->orderby('id')->get();
        // return response()->json($Menu,200);
        // return MenuResource::collection($Menu);
        // return response()->json(['error' => 'Error de autenticación'], 401);
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
          'nivel'   => 'required|integer',
          'nombre'  => 'required|string',
          'padre'   => 'required|integer',
          'accion'  => 'required|string',
          'icono'   => 'required|string',
      ]);
      $id = Auth::user()->id;
      $request->request->add(['estado' => true]);
      $request->request->add(['iduser' => $id]);
      $menucreate = menu::create($request->all());
       return response()->json(['message' => 'Menu registrado correctamente!!', 'rol' => $menucreate],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $menu = menu::find($id);
       if (!$menu) {
           return response()->json([
               'success' => false,
               'message' => 'No se encontro el Menu'], 404);
       }
       return response()->json([
           'success' => true,
           'data' => $menu->toArray()], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $menu=menu::find($id);
  		// Si no existe ese rol devolvemos un error.
  		if (!$menu)
  		{
  			// Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
  			return response()->json(["errors"=>array(["code"=>404,"message"=>"No se encuentra el Menu con ese código."])],404);
  		}
      $request->validate([
        'nivel' => 'required|integer',
        'nombre' => 'required|string',
        'padre' => 'required|integer',
        'accion' => 'required|string',
        'icono' => 'required|string',
        'estado' => 'required|boolean',
      ]);
      $menu->nivel      = $request["nivel"];
      $menu->nombre     = $request["nombre"];
      $menu->padre      = $request["padre"];
      $menu->accion     = $request["accion"];
      $menu->icono      = $request["icono"];
      $menu->estado     = $request["estado"];
      $menu->iduser     = Auth::user()->id;
      $rol->save();
      return response()->json(["success" => true,
                               "message" => "Menu actualizado correctamente."],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $menu = menu::find($id);
       if (!$menu) {
           return response()->json([
               "success" => false,
               "message" => "No se encontro el Menu"], 404);
       }
       $menu->delete();
       // Se usa el código 204 No Content – [Sin Contenido] Respuesta a una petición exitosa que no devuelve un body (como una petición DELETE)
       return response()->json(["code"=>204,"message"=>"Se ha eliminado el Meni correctamente."],404);
    }
}
