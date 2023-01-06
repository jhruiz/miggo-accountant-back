<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\tercero;
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

    public function store(UserRequest $request) //form-data
    {
        // return response()->json('email:'.$request->has('formData'));//TODO: formData 

                $tercero = new tercero();
                if($request->has('nombres')){
                    $tercero->nombres = $request->nombres;
                }

                if($request->has('apellidos')){
                    $tercero->apellidos = $request->apellidos;
                }


                if($request->has('identificacion')){
                    $tercero->identificacion = $request->identificacion;
                }

                if($request->has('rut')){
                    $tercero->rut = $request->rut;
                }

                if($request->has('tipo_identificacion')){
                    $tercero->tipo_identificacion = $request->tipo_identificacion;
                }

                if($request->has('direccion')){
                    $tercero->direccion = $request->direccion;
                }

                if($request->has('celular')){
                    $tercero->celular = $request->celular;
                }

                if($request->has('telefono')){
                    $tercero->telefono = $request->telefono;
                }
                
                if($request->has('email')){
                    $tercero->email = $request->email;
                }

                if($request->has('cumpleanios')){
                    $tercero->cumpleanios = $request->cumpleanios;
                }

                if($request->has('ciudade_id')){
                    $tercero->ciudade_id = $request->ciudade_id;
                }

                $tercero->save();


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
        $user->tercero_id = $tercero->id;

        if($request->has('empresa_id')){
            $user->empresa_id = $request->empresa_id;
        }
        if($request->has('perfile_id')){
            $user->perfile_id = $request->perfile_id;
        }

        $user->save();

        $empleado = new Empleado();
        $empleado->tercero_id = $tercero->id;
        $empleado->user_id = $request->creador_id;
        $empleado->save();

        $real = User::find($user->id);
        $real->tercero;
        $real->empresa;
        return $this->showOne($real, 201);

    }


   public function show(User $user)
    {
        $user->tercero;
        $user->empresa;
        $user->perfile;
        return $this->showOne($user);
    }

    public function update(UserRequest $request, User $user)  // x-www-form-urlencoded //todo admin only if verificate 052
    {

        // if($user->isDirty()){
        //     return response()->json(['error' => 'Se debe especificar al menos un valor diferente para actualizar',
        //      'code' => 422], 422);
        // }

            // return response()->json('email:'.$request->has('email'));//TODO: formData 
            // return response()->json('email:'.$request->email);

        
        if($request->has('username')){
                $user->username = $request->username;
        }

        if($request->has('password')){
              $user->password = bcrypt($request->password);
        }

        if($request->has('email')){
            $user->email = $request->email;
        }
         
        if($request->has('perfile_id')){
            $user->perfile_id = $request->perfile_id;
        }

        if ($request->file('imagen')) {
            // $imagen_path = public_path().'/images/img_api/users/'.$user->imagen;
            $imagen_path = public_path().'\images\img_api\users\''.$user->imagen;
            // unlink($imagen_path); TODO: elimina la foto vieja pero debe ser provado en el servidor ya que arregla las carpetas segun el sistema operativo buscar alternativa

            $file = $request->file('imagen');
            $nombre = 'user'.time() . '.' . $file->getClientOriginalExtension();
            // $path = public_path() . '\images\img_api\users';
            // $file->move($path, $nombre);

            $path = public_path('images/img_api/users/'.$nombre);
            $img = Image::make($file)->fit(144, 144)->save($path);
            $user->imagen = $nombre;

            }

        $user->save();

        $tercero = tercero::findOrFail($user->tercero_id);

        if($request->has('nombres')){
            $tercero->nombres = $request->nombres;
        }

        if($request->has('apellidos')){
            $tercero->apellidos = $request->apellidos;
        }

        if($request->has('tipoidentificacione_id')){
            $tercero->tipoidentificacione_id = $request->tipoidentificacione_id;
        }

        if($request->has('identificacion')){
            $tercero->identificacion = $request->identificacion;
        }

        if($request->has('email')){
            $tercero->email = $request->email;
        }

        if($request->has('direccion')){
            $tercero->direccion = $request->direccion;
        }

        if($request->has('rut')){
            $tercero->rut = $request->rut;
        }

        if($request->has('celular')){
            $tercero->celular = $request->celular;
        }

        if($request->has('telefono')){
            $tercero->telefono = $request->telefono;
        }

        if($request->has('cumpleanios')){
            $tercero->cumpleanios = $request->cumpleanios;
        }

        if($request->has('ciudade_id')){
            $tercero->ciudade_id = $request->ciudade_id;
        }

        $tercero->save();

        $user->tercero;
        $user->perfile;
        return $this->showOne($user);
    }

    public function destroy(User $user)
    {
        $user->delete($user);
        $user->tercero;
        return $this->showOne($user);
    }

    public function estatus(User $user) //TODO: NO DEJAR LOGEAR SI ESTA EN FALSE
    {
        $user->estatus = $user->estatus ? false : true;
        $user->update();
        $user->tercero;
        return $this->showOne($user);
    }
}
