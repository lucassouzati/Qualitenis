<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Permissao;
use App\User;
use Illuminate\Database\Schema\Blueprint;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        
        
        $permissoes = Permissao::with('papels')->get();
        if (is_array($permissoes) || is_object($permissoes)) {
               
            
            foreach ($permissoes as $permissao) {
                $gate->define($permissao->nome, function(User $user) use ($permissao){
                    //dd($user);
                    return $user->temPermissao($permissao);
                });
            }
            
            $gate->before(function(User $user){
                if ($user->temPapeis('admin')) {
                    return true;
                }
            });
       }
        
    }
}
