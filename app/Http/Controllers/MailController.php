<?php

namespace App\Http\Controllers;

use App\Mail\SendMail; 
use App\Mail\BasicoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmailBasic(){
        $details=[
            'title' => 'correo de prueba',
            'body' =>'este es un ejemplo para enviar correos'
        ];

        Mail::to("miggodesarrollo@gmail.com")->send(new BasicoMailable($details));
        
        return response()->json([
            'message' => 'correo electronico enviado'
        ]);
    }
}
