<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdatePasswordRequest;
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordController extends Controller
{
    public function passwordResetProcess(UpdatePasswordRequest $request){
        return $this->updatePasswordRow($request)->count() > 0 ? $this->resetPassword($request) : $this->tokenNotFoundError();
      }
  
      // Verificar si el token es válido
      private function updatePasswordRow($request){
         return DB::table('password_resets')->where([
             'email' => $request->email,
             'token' => $request->resetToken
         ]);
      }
  
      // Respuesta de token no encontrado  
      private function tokenNotFoundError() {
          return response()->json([
            'error' => 'su correo electrónico o token es incorrecto.'
          ],Response::HTTP_UNPROCESSABLE_ENTITY);
      }
  
      // Restablecer la contraseña
      private function resetPassword($request) {
          // encontrar correo electrónico
          $userData = User::whereEmail($request->email)->first();
          // Actualiza contraseña
          $userData->update([
            'password'=>bcrypt($request->password)
          ]);
          // eliminar datos de verificación de db
          $this->updatePasswordRow($request)->delete();
  
          // respuesta de restablecimiento de contraseña
          return response()->json([
            'data'=>'La contraseña ha sido actualizada.'
          ],Response::HTTP_CREATED);
      }    
}
