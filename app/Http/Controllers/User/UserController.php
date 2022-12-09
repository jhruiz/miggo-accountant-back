<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\User;

//use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

class UserController extends ApiController
{
    public function index()
    {
        $usuarios = User::all();
        return $this->showAll($usuarios);
    }

    public function store(UserRequest $request) //form-data
    {
        
        $user = new User($request->all());

        if ($request->file('imagen')) {

            $file = $request->file('imagen');
            $nombre = 'user'.time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\images\img_api\users';
            $file->move($path, $nombre);
            $user->imagen = $nombre;
        }

        $user->password  = bcrypt($request->password);

        if($request->has('empresa_id')){
            $user->empresa_id = $request->empresa_id;
        }
        $user->save();
        return $this->showOne($user, 201);
    }

   public function show(User $user)
    {
        $user->persona;
        $user->empleado;
        return $this->showOne($user);
    }

    public function update(UserRequest $request, User $user)  // x-www-form-urlencoded //todo admin only if verificate 052
    {

        $user->fill($request->all());

        $user->password = bcrypt($request->password);

        if($request->has('empresa_id')){
            $user->empresa_id = $request->empresa_id;
        }

        if ($request->file('imagen')) {

            $imagen_path = public_path().'/images/img_api/users/'.$user->imagen;
            unlink($imagen_path);

            $file = $request->file('imagen');
            $nombre = 'user'.time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\images\img_api\users';
            $file->move($path, $nombre);
            $user->imagen = $nombre;

            }
        
            //if($user->isDirty()){ //TODO:test 
           /* if($user->isClean()){
                return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
              }*/

        $user->save();
        return $this->showOne($user);
    }

    public function destroy(User $user)
    {
        $user->delete($user);
        return $this->showOne($user);
    }
}
