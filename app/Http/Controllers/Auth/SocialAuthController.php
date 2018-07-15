<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        
        $user = $this->getOrCreateUser($googleUser);
        
        Auth::login($user);
        
        return redirect()->route('currencies.index');
          
    }
    /**
     * @param  object  $googleUser
     * @return User 
     */
    private function getOrCreateUser($googleUser): User
    {
        if($user = User::where('email',$googleUser->email)->first()) {
            return $user;
        }
        return User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => 'password',
            'is_admin' => 1,
        ]);
    }
   
}
