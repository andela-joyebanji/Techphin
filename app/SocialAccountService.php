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
        }
        $account = new SocialAccount([
            'provider_user_id' => $providerUser->getId(),
            'provider'         => $providerName,
        ]);

        $user = $this->resolveUser($providerName, $providerUser);

        $account->user()->associate($user);
        $account->save();

        return $user;
    }

    private function resolveUser($providerName, $providerUser)
    {
        $user = User::whereEmail($providerUser->getEmail())->first();

        if (!$user) {
            $user = $this->createUser($providerName, $providerUser);
        }

        return $user;
    }

    public function createUser($providerName, $providerUser)
    {
        $name = explode(' ', $providerUser->getName());
        $firstname = $name[0];
        $lastname = implode(' ', array_slice($name, 1));
        $avatar = $providerUser->getAvatar();
        if (strpos(strtolower($providerName), 'github') !== false) {
            $avatar = $providerUser->avatar;
        }
        // If the email returned is null, we concatenate the user provider Id,
        // `@` and provider name for email field.
        $email = $providerUser->getEmail()
                                ? $providerUser->getEmail() : $providerUser->getId().'@'.$providerName;

        return User::create([
            'email'     => $email,
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'image'     => $avatar,
            'username'  => strtolower($firstname).'.'.time(),
            'password'  => '',
            'role'      => 'user',
        ]);
    }
}
