<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Redirect, Response, File;
use Socialite;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class SocialController extends Controller
{
    use AuthenticatesUsers;
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
       



        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo, $provider);

        // return $user['email'].$user['password'];
            
        if(auth()->attempt(array('email' => $user['email'], 'password' => '12')))
        {
            
            return redirect()->route('inicio');
        }else{
            return "algo malo paso";
            return $this->sendFailedLoginResponse($request);

            return redirect()->route('login')
                ->with('datos','Email-Address And Password Are Wrong.');
        }     


        // $usuario = User::where('slug', $user->slug);
        // Auth::login($user);
        // return redirect()->route('inicio');
        // if (Auth::attempt($user)) {
        //     // Authentication passed...

        // } else {
        //     return 'oh no un problema';
        // }

        //    auth()->login($user); 

        //    return redirect()->to('/');
    }
    function createUser($getInfo, $provider)
    {
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {

            $usuario = new User();
            $usuario->nombre = $getInfo->name;
            $usuario->password = bcrypt('12');
            $usuario->nickname = Str::slug($getInfo->name);
            $usuario->slug = Str::slug($getInfo->name);
            $usuario->email = $getInfo->email;
            $usuario->provider = $provider;
            $usuario->provider_id = $getInfo->id;
            $usuario->admin = 'no';
            $usuario->save();
            //   $user = User::create([
            //      'nombre'     => $getInfo->name,
            //      'password'     => '',
            //      'nickname' =>$getInfo->name,
            //      'slug'=>Str::slug($getInfo->name),
            //      'email'    => $getInfo->email,
            //      'provider' => $provider,
            //      'provider_id' => $getInfo->id
            //  ]);
            return $usuario;
        }
        return $user;
    }
}
