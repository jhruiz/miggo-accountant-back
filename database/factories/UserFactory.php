<?php

namespace Database\Factories;

use App\Models\Tercero;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{

    public function definition()
    {
        static $password;
        $terceros = Tercero::orderBy('id', 'ASC')->pluck('id')->all();

        $img = file_get_contents(__DIR__.'/../../public/images/profile/user-uploads'.'/user-'.'0'.rand(1, 9).'.jpg');
        $fileName = Str::random(5).'_'.'.jpg';
        file_put_contents("public/images/img_api/users/$fileName", $img);

        return [
            'username' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $password ?: $password = bcrypt('12345678'), 
            'remember_token' => Str::random(10),
           // 'estatus' => $this->faker->randomElement($array = array (0,1)),
            'estadologin' => $this->faker->randomElement($array = array (0,1)),
            'intentos' => $this->faker->randomElement($array = array (1,2,3)),
            'email_verified_at' => now(),
            'empresa_id' => 1,
            'imagen' =>  $fileName,
            'Tercero_id' => $this->faker->unique()->randomElement($terceros),

            ];
    }


    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
