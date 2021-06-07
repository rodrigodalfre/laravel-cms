<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $loggedId = intval(Auth::id());

        $user = User::find($loggedId);

        if($user){
            return view('admin.profile.index',[
                'user' => $user
            ]);
        }else {
            return redirect()->route('admin');
        }
    }

    public function save(Request $request){
        
        $loggedId = intval(Auth::id());
        $user = User::find($loggedId);

        if($user){
            $data = $request->only([
                'name',
                'email',
                'password',
                'password_confirmation'
            ]);

            $validator = Validator::make([
                'name' => $data['name'],
                'email' => $data['email']
            ],[
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'email', 'max:100']
            ]);

            if($validator->fails()){
                return redirect()->route('profile', [
                    'user' => $loggedId
                ])->withErrors($validator);
            }

            // 1. Alterar o nome
            $user->name = $data['name'];

            // 2. Alteração do email
            // 2.1 Verificar se o email foi alterado
            if($user->email != $data['email']){
                // 2.2 Verificamos se o email existe
                $hasEmail = User::where('email', $data['email'])->get(); 
                // 2.3 Se não existe, alterar.
                if(count($hasEmail) === 0){
                    $user->email = $data['email']; 
                }
            }

            // 3. Alteração de senha
            // 3.1 Verifica se o user digitou a senha
            if(!empty($data['password'])){
                if(strlen($data['password']) >= 4){
                    // 3.2 Verifica se a confirmação está ok
                    if($data['password'] === $data['password_confirmation']){
                        // 3.3 Altera a senha
                        $user->password = Hash::make($data['password']);
                    }
                } else{
                    $validator->errors->add('password', __('validation.min.string', [
                        'attribute' => 'password',
                        'min' => 4
                    ]));
                }
            }
            $user->save();

            return redirect()->route('profile')
            ->with('warning', 'Usuario alterado com sucesso');
        }

        return redirect()->route('profile');
    }
}
