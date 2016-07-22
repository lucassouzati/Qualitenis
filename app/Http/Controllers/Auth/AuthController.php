<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use DB;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => ['logout','register','showRegistrationForm','index','editar','atualizar','desativar']]);
    }

    public function index()
    {   
       // $funcionarios = new \App\User;
       //$funcionarios = DB::table('users')->get();
       $funcionarios = \App\User::paginate(15);
       return view('auth.index',compact('funcionarios'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',            
            'CPF' => 'required|max:255',
            'password' => 'required|min:8|max:16|confirmed',
            'cidade_id' => 'required|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
       
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'CPF' => $data['CPF'],
            'password' => bcrypt($data['password']),
           
        ]);
    }


    //EDITAR FUNCIONARIO
     public function editar($id)
    {
        $user = \App\User::find($id);
        if(!$user){
            \Session::flash('flash_message',[
                'msg'=>"Não existe esse funcionario cadastrado!",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('register');
        }

        return view('Auth.editar',compact('user'));
    }

     public function atualizar(Request $request, $id)
    {
        
       $this->validate($request, [
            
            'name' => 'required|max:255',
             'telefone' => 'required|min:9',          
            'CPF' => 'required|max:255',
            'cidade_id' => 'required|max:255',
            
        ]);
        

       

        $user = \App\User::find($id);
        $user->name = $request->input('name');
       
        $user->telefone = $request->input('telefone');
        $user->CPF = $request->input('CPF');
        $cidade = \App\Cidade::find($request->input('cidade_id'));
        $user->cidade()->associate($cidade);
        $academia = \App\Academia::find($request->input('academia_id'));
        $user->academia()->associate($academia);
       

               
        
        
        
        

       
        $user->update();
        

        \Session::flash('flash_message',[
            'msg'=>"Funcionario atualizada com Sucesso!",
            'class'=>"alert-success"
        ]);
    
        return redirect()->route('auth.index');        
        
    }

    public function desativar($id)
    {
        $user = \App\User::find($id);

        $user->ativo = false;

        $user->update();

        \Session::flash('flash_message',[
            'msg'=>"Funcionario desativado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('auth.index');

    }

   
}
