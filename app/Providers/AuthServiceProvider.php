<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Permissao;
use App\User;
use Illuminate\Database\Schema\Blueprint;
use DB;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        \App\Permissao::class => App\Policies\PermissaoPolicy::class,

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
        

       	try {
       		
       	
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
       	} catch (Exception $e) {
       		
       	}finally{
       		return false;
       	}

    }
}
