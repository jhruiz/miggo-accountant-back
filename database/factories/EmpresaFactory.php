<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class EmpresaFactory extends Factory
{

    public function definition()
    {

        $img = file_get_contents(__DIR__.'/../../public/images/profile/user-uploads'.'/user-'.'0'.rand(1, 9).'.jpg');
        $fileName = Str::random(5).'_'.'.jpg';
        file_put_contents("public/images/img_api/empresas/$fileName", $img);


        return [

        'nombre' => $this->faker->name,   
        'nit'=> Str::random(10),
        'direccion'=>$this->faker->address,
        'telefono1'=>$this->faker->phoneNumber,
        'telefono2'=>$this->faker->phoneNumber,
        'email' => $this->faker->unique()->safeEmail,
        'representantelegal' => $this->faker->name,   
        'imagen' =>  $fileName,
        'logo' =>  1,
        'texto1'=>$this->faker->address,
        'texto2'=>$this->faker->address,
        'texto3'=>$this->faker->address,
        'texto4'=>$this->faker->address,
        'vercuentasdb'=>$this->faker->unique()->randomNumber($nbDigits = 5),

        ];  

    }
}
