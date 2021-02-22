<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Post'=>'App\Policies\PostPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('isallowed',function($user,$allowed){
        //     $allowed=explode(':',$allowed);
        //     $roles=$user->roles->pluck('name')->toArray();
        //     return array_intersect($allowed,$roles);
        // });
        // Gate::define('isallowedP',function($user,$post){
        //     return $user->id===$post;
        // });
        // Gate::define('isallowedP','App\Gates\PostGate@allowed');
        // Gate::define('allow-edit','App\Gates\PostGate@allowedAction');
    }
}
