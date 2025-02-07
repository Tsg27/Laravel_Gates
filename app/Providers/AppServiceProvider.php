<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     * As políticas são registradas em um array associativo.
     * Onde a chave é o modelo e o valor é a classe da política.
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];


    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        

         
         /**
         * beforce, que é uma maneira de verificar se um usuário e administrador.
         */
         Gate::before(function (User $user, string $ability) {
            if ($user->isAdministrator()) {
                return true;
            }
        });


        /**
         * define, que é uma maneira de verificar se um usuário tem permissão para realizar uma ação específica.
         */
        Gate::define('update-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('post-store', function (User $user) {
            return true; // Permite que qualquer usuário autenticado crie posts
        });


        Gate::define('update-user', function (User $user) {
            return true; // Permite que qualquer usuário autenticado atualize post
        });

    }
}
