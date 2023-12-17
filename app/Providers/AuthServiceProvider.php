<?php

namespace App\Providers;

use App\Models\Publicacao;
use App\Models\User;
use App\Policies\PublicacaoPolicy;
use App\Policies\ResenhaPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Publicacao' => 'App\Policies\PublicacaoPolicy',
        'App\Models\Resenha' => 'App\Policies\ResenhaPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-pub', [PublicacaoPolicy::class, 'create']);
        Gate::define('store-res', [ResenhaPolicy::class, 'create']);
    }
}
