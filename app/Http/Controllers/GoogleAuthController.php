<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\Auth;
use Session;
use Exception;
use App\Models\User;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);
                return redirect('/home');

            }else{

                $newUser = User::create([
                    
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'google',
                ]);

                Auth::login($newUser);
                return redirect('/home');
            }

        } catch (Exception $e) {

            dd($e->getMessage());
        }
    }
}
