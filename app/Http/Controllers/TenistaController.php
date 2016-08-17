<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ActivationService;

use Auth;

class TenistaController extends Controller
{
    //



    /*
    Configuração de ativação por e-mail ok. Ainda não sei porque o método guestMiddleware() não funciona com esse controller. Devo estudar a fundo melhor esses métodos do middleware. 

    */
    protected $activationService;

    public function __construct(ActivationService $activationService)
    {
        //$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->activationService = $activationService;
    }

 
    
    public function login()
    {
        return view('auth.login-tenista');
    }


    /*
    Login funcionando ok, porém ainda está permitindo que logue de uma vez.

    */

    public function postLogin(Request $request)
    {    
        
        

        $validator = validator($request->all(), [
                'email' => 'required',
                'password' => 'required',
            ]);
        //dd($validator->errors());
        if($validator->fails()){
            //  dd($validator->errors());
            return redirect('/tenista/login')->withErrors($validator)->withInput();

        }

        $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];
        
        //Primeiro o sistema confere o login e a senha

        if(auth()->guard('tenista')->attempt($credentials)){
    
            $credentials = array_add($credentials, 'statustenista_id', 1);

            //Depois, ele confere se o status do tenista é 1

            if(auth()->guard('tenista')->attempt($credentials)){

                //Depois ele confere o status dele é activated (email confirmado)

                if(!auth()->guard('tenista')->user()->activated){
                    $this->activationService->sendActivationMail(auth()->guard('tenista')->user());

                    Auth::guard('tenista')->logout();
                    return back()->with('warning', 'Você precisa confirmar sua conta. Nós enviamos um código de ativação, confira seu e-mail por favor.');
                }
                else{
                    return $this->index();        
                }
                
            }
            else{
                Auth::guard('tenista')->logout();
                return back()->with(['warning' => 'Desculpe, mas esta conta está desativada! Entre em contato com um administrador'])->withInput();    
            }

        } else {
           
            $result = app('App\Http\Controllers\Auth\AuthController')->login($request);
            if(!Auth::check()){

                return redirect('/tenista/login')->withErrors(['email' => 'Login ou senha inválidos!'])->withInput();    
            }else {
                return redirect('/home');
            }
        }

        
    }

    public function logout()
    {
        auth()->guard('tenista')->logout();
        \Session::flush();
        return redirect('/tenista/login');
    }

    public function trocaStatus(Request $request, $id){
        $tenista = \App\Tenista::find($id);
        $tenista->statustenista()->associate(\App\Statustenista::find($request->input('statustenista_id')));
        $tenista->update();
        //return redirect()->route('tenista.detalhe', compact('tenista')); 
        return redirect('/tenista/logout');
    }

    public function trocaStatusPorAdm(Request $request, $id){
        $tenista = \App\Tenista::find($id);
        $tenista->statustenista()->associate(\App\Statustenista::find($request->input('statustenista_id')));
        $tenista->update();
        return redirect()->route('tenista.lista'); 
    }

    public function trocaClasse(Request $request, $id){
        $tenista = \App\Tenista::find($id);
        $tenista->classe()->associate(\App\Classe::find($request->input('classe_id')));
        $tenista->update();
        return redirect()->route('tenista.lista'); 
    }

    public function index()
    {   
        $torneios = \App\Torneio::where('statustorneio_id', '2')->orWhere('statustorneio_id', '4')->orderBy('data', 'desc')->paginate(5);

        

        return view('tenista.index', compact('torneios'));
    }


    
    //
    public function adicionar()
    {	
    	$estados = \App\Estado::lists('nome', 'id');
        $estados = array_add($estados, '', '');
    	return view('tenista.adicionar', compact('estados'));
    }




    public function atualizar(Request $request, $id)
    {   

        $this->validate($request, [
            
            'nome' => 'required',
            'datadenascimento' => 'required|date_format:j/m/Y',
            
            'telefone' => 'required',
            'cidade_id' => 'required',
            'academia_id' => 'required',
            'sexo' => 'required'
            
        ]);
        

       

        $tenista = \App\Tenista::find($id);
        $tenista->nome = $request->input('nome');
        
        
        $tenista->telefone = $request->input('telefone');
        $cidade = \App\Cidade::find($request->input('cidade_id'));
        $tenista->cidade()->associate($cidade);


        $academia = \App\Academia::find($request->input('academia_id'));
        $tenista->academia()->associate($academia);              
        $date = date_create_from_format('j/m/Y', $request->input('datadenascimento'));
        $tenista->datadenascimento = date_format($date, 'Y-m-d');
        
        $tenista->sexo = $request->input('sexo');
        
        

        //\App\Cliente::find($id)->addTenista($tenista);
        $tenista->update();

        
        \Session::flash('flash_message',[
            'msg'=>"Tenista atualizado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return $this->index();
        
    }

    public function salvar(Request $request)
    {   
        //dd($request);
        $this->validate($request, [
            
            'nome' => 'required',
            'login' => 'required|unique:tenistas',
            'password' => 'required|min:8|max:16',
            'datadenascimento' => 'required|date_format:j/m/Y',
            'email' => 'required|email|unique:tenistas',
            'telefone' => 'required',
            'cidade_id' => 'required',
            'academia_id' => 'required',
            'sexo' => 'required'
            
        ]);

        $tenista = new \App\Tenista;
        $tenista->nome = $request->input('nome');
        $tenista->login = $request->input('login');
        $tenista->password = bcrypt($request->input('password'));
        $tenista->email = $request->input('email');
        $tenista->telefone = $request->input('telefone');
        $cidade = \App\Cidade::find($request->input('cidade_id'));
        $tenista->cidade()->associate($cidade);
        $academia = \App\Academia::find($request->input('academia_id'));
        $tenista->academia()->associate($academia);
        $classe = \App\Classe::find($request->input('classe_id'));
        $tenista->classe()->associate($classe);
        $date = date_create_from_format('j/m/Y', $request->input('datadenascimento'));
        $tenista->datadenascimento = date_format($date, 'Y-m-d');
        $tenista->sexo = $request->input('sexo');
        $statustenista = \App\Statustenista::find($request->input('statustenista_id'));
        $tenista->statustenista()->associate($statustenista);
//          dd($tenista);
        //\App\Cliente::find($id)->addTenista($tenista);
        $tenista->save();

         $this->activationService->sendActivationMail($tenista);

        \Session::flash('flash_message',[
            'msg'=>"Cadastrado realizado com Sucesso! Antes de logar, confirme seu e-mail pelo link enviado.",
            'class'=>"alert-success"
        ]);

        return redirect()->route('tenista.adicionar');
        
    }

       public function editar($id)
    {
        $estados = \App\Estado::lists('nome', 'id');
        $tenista = \App\Tenista::findOrFail($id);

        if(!$tenista){
            \Session::flash('flash_message',[
                'msg'=>"Não existe esse tenista cadastrado! Deseja cadastrar um novo tenista?",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('tenista.adicionar');
        }
        if(auth()->guard('tenista')->user()->id != $id){
            \Session::flash('flash_message',[
                'msg'=>"Não é permitido alterar informações de outro tenista.",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('tenista.index');   
        }

        return view('tenista.editar',compact('tenista'), compact('estados'));
    }

    public function deletar($id)
    {
        $tenista = \App\Tenista::find($id);

        $tenista->delete();

        \Session::flash('flash_message',[
            'msg'=>"Tenista deletado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('tenista.adicionar'); 
    }

     public function lista()
    {   
        $tenistas = \App\Tenista::paginate(10);
        return view('tenista.lista', compact('tenistas'));
    }
     
    public function detalhe($id)
    {   
        $tenista = \App\Tenista::find($id);
        return view('tenista.detalhe', compact('tenista'));
    }

   



    public function activateTenista($token)
    {
    if ($tenista = $this->activationService->activateUser($token)) {
        auth()->guard('tenista')->login($tenista);
        return $this->index();
    }
    abort(404);
    }

}




