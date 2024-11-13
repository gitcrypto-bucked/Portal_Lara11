<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserModel;

class UserController extends Controller
{

    public function newUser()
    {
        return view('add_user');
    }

    //salva dados de cadastro de usuario, envia e-mail para o mesmo cadastrar a senha
    public function createNewUser(Request $request)
    {

        $model = new UserModel();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'confirm_email'=> 'required|same:email',
            'empresa'=>'required',
            'centrocusto'=>'required',
            'level'=>'required'
        ]);

        $user_token = substr(number_format(time() * rand(),0,'',''),0,6);
        if($model->tokenExists($user_token))
        {
            $user_token = substr(number_format(time() * rand(),0,'',''),0,6);
            if($model->tokenExists($user_token))
            {
                $user_token = substr(number_format(time() * rand(),0,'',''),0,6);
            }
        }

        $created_at= date('Y-m-d H:i:s', time());

        if($request->email!=$request->confirm_email)
        {
            return redirect('/new_user')->with('error', 'O email não coincide com o de confirmação.');
        }

        // insere o usuario na tabela users
        $model->addUser($request->name,
                        $request->email,
                        $request->level,
                        $created_at,
                        $request->empresa,
                        $user_token,
                        $request->centrocusto);

        $token = md5(bin2hex(random_bytes(32))); // token de acesso para usuario cadastrar

        $model->createPasswordReset($request->email, $token, date('Y-m-d H:i:s'));

        $createUserPassWordURL =route("user-token",$token);

        event(new \App\Events\RegistredUser(['name'=>$request->name, 'email'=>$request->email, 'user_token'=>$user_token, 'url'=>$createUserPassWordURL]));

        return redirect('/new_user')->with('success', 'Cadastro Realizado com Sucesso!');

    }

    //usuario cadastrado, valida se o token de acesso é valido e envia para pagina de alterar senha
    public function checkUserToken(Request $request)
    {
        $token = $request->token;
        $model = new UserModel();
        $user =$model->getUserAndTokenValid($token);

        if(isset($user[0]) && !empty($user[0]))
        {
            return view("password-update",['user' =>  $user, 'token'=>$request->token]); //envia para view o usuario alterar a senha
        }
        if(!isset($user[0]) && empty($user[0]))
        {
            return redirect('/expired_link');  // o usuario ja alterou a senha ou token expirou
        }
    }

    //usuario cadastrado, permite cadastrar senha de acesso via link
    //funciona no fluxo de recuperar senha
    public function registerUserPassword(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'company'=>'required',
            'password' => 'required|min:8',
            'passwordConfirmation' => 'min:8',
        ]);

        if(strtolower($request->password )!= strtolower($request->passwordConfirmation))
        {
            return view("password-update")->with('error', 'A senha e confirmação de senha não coincidem!');
        }
        DB::table('users')->where('email', $request->email)->update(['empresa'=>$request->empresa, 'password'=> Hash::make($request->senha),]);
        DB::table('password_reset_tokens')->where('token','=',$request->token)->delete();

        return redirect('/login')->with('success', 'Senha Cadastrada com Sucesso!');
    }


    // Usuario cadastrado e logado Permite alterar sua senha
    public function updateUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:users',
            'senha' => 'required|min:8',
            'confsenha' => 'min:8',
        ]);

        User::updated([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
        ]);
        return redirect('/user-profile')->with('success', 'Dados atualizados com sucesso.');

    }

    /**fluxo para recuperação de senha, */
    /**verifica se usuario está cadastrado e ativo*/

    public function recoverPassword(Request $request)
    {
        $request->validate([
            'typeEmailX' => 'required|email'
        ]);
        $email = $request->typeEmailX;
        $model = new UserModel();
        $user = $model->getUserByEmail($email)[0];
        if($user->partner!='1')
        {
            return redirect('/forgot-password')->with('error', 'Usuario invalido!'); //parceiro desabilitado
        }
        $token = md5(bin2hex(random_bytes(32))); // token de acesso para usuario cadastrar

        $model->createPasswordReset($user->email, $token, date('Y-m-d H:i:s'));

        $createUserPassWordURL =route("user-token",$token);

        event(new \App\Events\UserRecovered(['name'=>$user->name, 'email'=>$user->email, 'user_token'=>$user->user_token, 'url'=>$createUserPassWordURL]));

        return redirect('/forgot-password')->with('success', 'Você receberá em instantes, um link no seu email cadastrado!');

    }

    public function forgotPassword():string
    {
        return view('password-recover');
    }


}
