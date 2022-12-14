<?php

namespace App\Http\Controllers\User;


use App\Models\User;
use App\Models\Persona;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Hash;

class UserController extends ApiController
{
    public function index()
    {
        $usuarios = User::all();
        return $this->showAll($usuarios);

        // $usuarios = User::paginate(5);
        // $custom = collect(['my_data' => 'My custom data here']);
        // $data = $custom->merge($usuarios);
        // return response()->json($data,200);

    }

    public function store(UserRequest $request) //form-data
    {
        
        if($request->has('identificacion') && $request->has('email') && $request->has('password') && $request->has('nombres') && $request->has('apellidos')){

                $persona = new Persona();
                if($request->has('nombres')){
                    $persona->nombres = $request->nombres;
                }

                if($request->has('apellidos')){
                    $persona->apellidos = $request->apellidos;
                }

                $persona->identificacion = $request->identificacion;

                if($request->has('rut')){
                    $persona->rut = $request->rut;
                }

                if($request->has('tipo_identificacion')){
                    $persona->tipo_identificacion = $request->tipo_identificacion;
                }

                if($request->has('direccion')){
                    $persona->direccion = $request->direccion;
                }

                if($request->has('celular')){
                    $persona->direccion = $request->direccion;
                }

                if($request->has('telefono')){
                    $persona->direccion = $request->direccion;
                }
                
                if($request->has('email')){
                    $persona->email = $request->email;
                }

                if($request->has('cumpleanios')){
                    $persona->cumpleanios = $request->cumpleanios;
                }

                if($request->has('ciudade_id')){
                    $persona->ciudade_id = $request->ciudade_id;
                }

                $persona->save();


        $user = new User($request->all());

        if ($request->file('imagen')) {

            $file = $request->file('imagen');
            $nombre = 'user'.time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\images\img_api\users';
            $file->move($path, $nombre);
            $user->imagen = $nombre;
        }

        $user->password  = bcrypt($request->password);
        $user->persona_id = $persona->id;

        if($request->has('empresa_id')){
            $user->empresa_id = $request->empresa_id;
        }

        $user->save();

        $real = User::find($user->id);
        $real->persona;
        $real->empresa;
        return $this->showOne($real, 201);
    }else{
        return $this->errorResponse('para crear un usuario se debe incluir minimo el nombre, apellido, identificacion, email y el password', 422);
        }
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
        $user->persona;
        return $this->showOne($user);
    }

    public function estatus(User $user) //TODO: NO DEJAR LOGEAR SI ESTA EN FALSE
    {
        $user->estatus = $user->estatus ? false : true;
        $user->update();
        $user->persona;
        return $this->showOne($user);
    }
}
