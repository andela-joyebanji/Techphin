<?php

namespace Pyjac\Techphin;

use Laravel\Socialite\Contracts\Provider;

class SocialAccountService
{
    public function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $name = explode(" ", $providerUser->getName());
                $firstname = $name[0];
                $lastname = implode(" ", array_slice($name, 1));
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'image' => $providerUser->getAvatar(),
                    'username' => strtolower($firstname).'.'.time(),
                    'password' => ""
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}
