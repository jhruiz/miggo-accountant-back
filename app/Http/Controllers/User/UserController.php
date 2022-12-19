<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Persona;
use App\Models\Empleado;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


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

    // public function store(UserRequest $request) //form-data
    public function store(Request $request) //form-data

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
            // $path = public_path() . '\images\img_api\users';
            // $file->move($path, $nombre);

            $path = public_path('images/img_api/users/'.$nombre);
            $img = Image::make($file)->fit(144, 144)->save($path);
            // return $img->response('jpg');
            $user->imagen = $nombre;
        }

        $user->password  = bcrypt($request->password);
        $user->persona_id = $persona->id;

        if($request->has('empresa_id')){
            $user->empresa_id = $request->empresa_id;
        }

        $user->save();

        $empleado = new Empleado();
        $empleado->persona_id = $persona->id;
        $empleado->creador_id = $request->creador_id;
        $empleado->save();

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
        $user->empresa;
        $user->perfile;
        return $this->showOne($user);
    }

    public function update(UserRequest $request, User $user)  // x-www-form-urlencoded //todo admin only if verificate 052
    {

        if($user->isDirty()){
            return response()->json(['error' => 'Se debe especificar al menos un valor diferente para actualizar',
             'code' => 422], 422);
        }
        
        $user->fill($request->all());

        $user->password = bcrypt($request->password);

        if ($request->file('imagen')) {

            $imagen_path = public_path().'/images/img_api/users/'.$user->imagen;
            unlink($imagen_path);

            $file = $request->file('imagen');
            $nombre = 'user'.time() . '.' . $file->getClientOriginalExtension();
            // $path = public_path() . '\images\img_api\users';
            // $file->move($path, $nombre);

            $path = public_path('images/img_api/users/'.$nombre);
            $img = Image::make($file)->fit(144, 144)->save($path);
            $user->imagen = $nombre;

            }

        $user->save();

        $persona = Persona::findOrFail($user->persona_id);

        if($request->has('nombres')){
            $persona->nombres = $request->nombres;
        }

        if($request->has('apellidos')){
            $persona->apellidos = $request->apellidos;
        }

        if($request->has('tipoidentificacione_id')){
            $persona->tipoidentificacione_id = $request->tipoidentificacione_id;
        }

        if($request->has('identificacion')){
            $persona->identificacion = $request->identificacion;
        }

        if($request->has('email')){
            $persona->email = $request->email;
        }

        if($request->has('direccion')){
            $persona->direccion = $request->direccion;
        }

        if($request->has('rut')){
            $persona->rut = $request->rut;
        }

        if($request->has('celular')){
            $persona->celular = $request->celular;
        }

        if($request->has('telefono')){
            $persona->telefono = $request->telefono;
        }

        if($request->has('cumpleanios')){
            $persona->cumpleanios = $request->cumpleanios;
        }

        if($request->has('ciudade_id')){
            $persona->ciudade_id = $request->ciudade_id;
        }

        $persona->save();

        $user->persona;
        $user->perfile;
        $user->empleado;
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
