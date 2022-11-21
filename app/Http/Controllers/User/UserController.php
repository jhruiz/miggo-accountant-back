<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

//use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

class UserController extends ApiController
{
    public function index()
    {
        $usuarios = User::all();
        $data = ['data'=>$usuarios];
        return $this->showAll($usuarios);
    }

    public function store(Request $request) //form-data
    {
        /*
        $reglas = [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            ];*/

        //$this->validate($request, $reglas);

        $user = new User($request->all());

        $user->password  = bcrypt($request->password);

        if($request->has('empresa_id')){
            $user->empresa_id = $request->empresa_id;
        }
        
        return $this->showOne($user, 201);
    }

   public function show(User $user)
    {
        return $this->showOne($user);
    }

    public function update(Request $request, User $user)//create UserRequest $request  // x-www-form-urlencoded //todo admin only if verificate 052
    {

       if($user->isDirty()){
        return response()->json(['error' => 'Se debe especificar al menos un valor diferente para actualizar',
         'code' => 422], 422);
        }

        $reglas = [
            'email' => 'email|unique:users,email,'.$user->id,
            'password' => 'min:6|confirmed'
        ];

        $this->validate($request, $reglas);

        $user->fill($request->all());

        $user->password = bcrypt($request->password);

        if($request->has('empresa_id')){
            $user->empresa_id = $request->empresa_id;
        }
        
        $user->save();
        return $this->showOne($user);
    }

    public function destroy(User $user)//User $user
    {
        $user->delete($user);
        return $this->showOne($user);
    }
}
