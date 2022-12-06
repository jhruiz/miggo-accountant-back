<?php

namespace App\Http\Controllers;

use App\Models\User;
// use FFI\Exception;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    

    public function register(Request $request){

        $validatedData = $request->validate([
            //'name' => 'required|string|max:50',
            'email' => 'required|string|max:80',
            'password' => 'required|string|min:8'
        ]);

        $user = User::create([
           // 'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
            ]);
            //])->sendEmailVerificationNotification();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function login(Request $request){
        //valida las credenciales del usuario
        if (!Auth::attempt($request->only('email', 'password'))){
            return response()->json([
                'message' => 'Credenciales de acceso no válidas'
            ], 401);
        }

        //Busca al usuario en la base de datos
        $user = User::where('email', $request['email'])->firstOrFail();

        //Genera un nuevo token para el usuario
        $token = $user->createToken('auth_token')->plainTextToken;

        //devuelve una respuesta JSON con el token generado y el tipo de token
        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function dataUser(Request $request){
        //devuelve la información del usuario
        //return $request->user();
        $usuario = User::findOrFail($request->user()->id);
        return $usuario;
    }

    public function logout(Request $request){

        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

       // $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'estas exitosamente deslogeado y el token a sido borrado'
        ]);
    }


   

    
}
