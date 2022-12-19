<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class UserRequest extends FormRequest
{

     public function authorize()
    {
        return true;
    }


    public function rules()
    {
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
                    'username' => 'min:4|max:20|unique:users',
                    'email' => 'bail|min:8|max:30|required|email|unique:users',
                    'password' => 'bail|min:8|max:120|required',
                    'telefono' => 'bail|nullable|min:7|max:15|required_without:celular',
                    'celular' => 'bail|nullable|min:9|max:15|required_without:telefono',
                    'cumpleanios' => 'date',
                    'empresa_id' => 'required',
                    'creador_id' => 'required',
                    'perfile_id' => 'required',
                  ];
              }
              case 'PUT':
                  {
                    $user = User::findOrFail($this->user->id);
                      return [
                        'username' => 'min:4|max:20|unique:users,username,'.$user->id,
                        'email' => 'bail|min:8|max:30|email|unique:users,email,'.$user->id,
                        'password' => 'bail|nullable|min:8|max:120',
                        'cumpleanios' => 'date',
                        'telefono' => 'bail|nullable|min:7|max:15|required_without:celular',
                        'celular' => 'bail|nullable|min:9|max:15|required_without:telefono',
                      ];
                  }
              case 'PATCH':
              {
              }
              default:break;
          }

      }
}
