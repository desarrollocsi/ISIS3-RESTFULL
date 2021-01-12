<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class AuthController extends Controller
{
     /**
     * Registro de usuario
     */
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
            // 'name' => 'required|min:4',
            // 'email' => 'required|email',
            // 'password' => 'required|min:8',
        ]);

        $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
        ]);
        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json([
            'message' => 'Usuario creado Existosamente!',
            'data'    => ['token' => $token] ], 200);
    }
     /**
     * Inicio de sesión, creación de token y menu
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (auth()->attempt($data)) {
            $user = auth()->user();
            $token = $user->createToken('LaravelAuthApp')->accessToken;
            $UserRol = new User();
            if ($UserRol->ValidaRolAdmin($user->id_rol)){
              return response()->json(['usuario'  => $user,
                                       'menu'  =>  $UserRol->MenuAdmin($user->id_rol),
                                       'token' => $token], 200);
            }else {
              return response()->json([ 'usuario'  => $user,
                                        'menu'  =>  $UserRol->MenuUser($user->id_rol),
                                        'token' => $token], 200);
            }
        } else {
            return response()->json(['error' => 'Error de autenticación'], 401);
        }
    }
    /**
     * Cierre de sesión (anular el token)
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Cerró sesión correctamente'
        ]);
    }

    /**
     * Obtener el objeto User como json
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

}
