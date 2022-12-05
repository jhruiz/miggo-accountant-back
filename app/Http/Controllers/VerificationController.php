<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class VerificationController extends ApiController
{
    public function verify($user_id, Request $request) {
        if (!$request->hasValidSignature()) {
            return $this->errorResponse('URL proporcionada no válida/caducada.', 401);
        }
    
        $user = User::findOrFail($user_id);
    
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
    
        return $this->showMessage('estas exitosamente verificado su correo electronico', 200);
    }
    
    public function resend($user_id, Request $request) {
        $user = User::findOrFail($user_id);

        if ($user->hasVerifiedEmail()) {
            return $this->errorResponse('Correo electrónico ya verificado.', 400);
        }
    
        $user->sendEmailVerificationNotification();

        return $this->showMessage('Enlace de verificación de correo electrónico, se a enviado  nuevamente');
    
    }
}
