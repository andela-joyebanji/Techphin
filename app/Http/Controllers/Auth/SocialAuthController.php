<?php

namespace Pyjac\Techphin\Http\Controllers\Auth;

use Auth;
use Pyjac\Techphin\Http\Controllers\Controller;
use Pyjac\Techphin\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    /**
     * Redirect to provider Oauth url.
     *
     * @param  $provider name of provider
     *
     * @return redirect to provider oauth url
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Handler of OAuth callbacks.
     *
     * @param SocialAccountService $service  [description]
     * @param mixed                $provider [description]
     *
     * @return redirect to provider oauth url
     */
    public function handleProviderCallback(SocialAccountService $service, $provider)
    {
        $user = $service->createOrGetUser(Socialite::driver($provider));
        auth()->login($user);

        return redirect()->intended('/videos');
    }
}
