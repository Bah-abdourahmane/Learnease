<?php

namespace App\Http\Controllers;

use App\Enums\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Stmt\TryCatch;

class SocialiteAuthController extends Controller
{
    public function redirect(Provider $provider)
    {
        return Socialite::driver($provider->value)->redirect();
    }
    public function authenticate(Provider $provider)
    {

        try {
            $socialiteUser = Socialite::driver($provider->value)->user();
            $user = User::firstOrCreate(
                ['email' => strtolower($socialiteUser->getEmail())],
                ['name' => $socialiteUser->getName(), 'password' => Hash::make(time())],
            );
            Auth::login($user);

            return redirect('/dashboard');
        } catch (\Exception $exception) {
            return to_route('login');
        }
    }
}
