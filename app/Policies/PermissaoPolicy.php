<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PermissaoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function permissoes()
    {
        $permissoes = Permissao::with('papels')->get();
            if (is_array($permissoes) || is_object($permissoes)) {
               dd($permissoes);
                
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
