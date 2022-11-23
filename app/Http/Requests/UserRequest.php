<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

     public function authorize()
    {
        return true;
    }


    public function rules()
    {
        //$user = User::find($this->users);

          switch($this->method())
          {
              case 'GET':
              case 'DELETE':
              {
                  return [];
              }
              case 'POST':
              {
                  return [
                    'username' => 'min:4|max:120|required|unique:users',
                    'email' => 'bail|min:4|max:120|required|email|unique:users',
                    'password' => 'min:4|max:120|required',
                   // 'role_id' => 'required',
                    //'persona_id' => 'required'

                  ];
              }
              case 'PUT':
                  {
                      return [
                        'username' => 'min:4|max:120|unique:users,username,'.$this->segment(2),
                        'email' => 'bail|min:4|max:120|email|unique:users,email,'.$this->segment(2),
                        'password' => 'bail|min:6|max:20,password,'.$this->segment(2),
                      //  'role_id' => 'required'

                      ];
                  }
              case 'PATCH':
              {
              }
              default:break;
          }

      }

      
      public function messages()
      {
          return [
              'username.required' => 'El :attribute es obligatorio.',
              'username.unique:users' => 'el username ya esta tomado',
              'username.min:4' => 'El :attribute debe tener un tamaño minimo de 4 caracteres',
              'username.max:120' => 'El :attribute debe tener un tamaño maximo de 120 caracteres',
              'password.required' => 'El :attribute es obligatorio.',
              'password.bail' => 'debe introducir un valor valido.',
              'username.unique:users' => 'El :attribute ya esta en uso.',
              'email.unique:users' => 'El :attribute ya esta en uso.',
              'email.required' => 'Añade un email correctos.'
          ];
      }
}
