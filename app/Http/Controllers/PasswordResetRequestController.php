<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Mail\SendMailreset;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PasswordResetRequestController extends Controller
{
    public function sendEmail(Request $request)  // esta es la función más importante para enviar correo y dentro de eso hay otra función
    {
        if (!$this->validateEmail($request->email)) {  //esto es validar para fallar enviar correo o verdadero
            return $this->failedResponse();
        }
        $this->send($request->email);  //esta es una función para enviar correo 
        return $this->successResponse();
    }

    public function send($email)  //esta es una función para enviar correo 
    {
        $token = $this->createToken($email);
        Mail::to($email)->send(new SendMailreset($token, $email));  // el token es importante en el envío de correo 
    }

    public function createToken($email)  // esta es una función para obtener su correo electrónico de solicitud de que hay o no enviar correo
    {
        $oldToken = DB::table('password_resets')->where('email', $email)->first();

        if ($oldToken) {
            return $oldToken->token;
        }

        $token = Str::random(40);
        $this->saveToken($token, $email);
        return $token;
    }


    public function saveToken($token, $email)  //esta función guarda la nueva contraseña
    {
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }

    public function validateEmail($email)  //esta es una función para obtener su correo electrónico de la base de datos
    {
        return !!User::where('email', $email)->first();
    }

    public function failedResponse()
    {
        return response()->json([
            'error' => 'El correo electrónico no se encuentra en nuestra base de datos'
        ], Response::HTTP_NOT_FOUND);
    }

    public function successResponse()
    {
        return response()->json([
            'data' => 'Restablecer correo electrónico se envió con éxito, verifique su bandeja de entrada.'
        ], Response::HTTP_OK);
    }
}
