<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        Schema::defaultStringLength(191);

        User::created(function($user){
           $user->sendEmailVerificationNotification(); 
        });

        User::updated(function($user){
            if($user->isDirty('email')){
                $user->sendEmailVerificationNotification(); 
            }
        });

    }


}
