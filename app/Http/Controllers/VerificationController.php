<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($user_id, Request $request) {
        if (!$request->hasValidSignature()) {
            return response()->json(["msg" => "URL proporcionada no válida/caducada."], 401);
        }
    
        $user = User::findOrFail($user_id);
    
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
    
        // return redirect()->to('/');
        return response()->json([
            'message' => 'estas exitosamente verificado su correo electronico'
        ]);
    }
    
    public function resend(Request $request) {// TODO: test or send to User_id
        if ($request->user()->hasVerifiedEmail()) {
            // if (auth()->user()->hasVerifiedEmail()) {
            return response()->json(["msg" => "Correo electrónico ya verificado."], 400);
        }
    
        // auth()->user()->sendEmailVerificationNotification();
        $request->user()->sendEmailVerificationNotification();
    
        return response()->json(["msg" => "Enlace de verificación de correo electrónico enviado en su identificación de correo electrónico"]);
    }
}
