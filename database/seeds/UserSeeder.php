<?php

use Illuminate\Database\Seeder;
use Pyjac\Techphin\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname' => 'Oyebanji',
            'lastname'  => 'Jacob',
            'username'  => 'pyjac',
            'email'     =>  'oyebanji@andela.com',
            'password'  => bcrypt('jacobu'),
            'role'      => 'user',
            'image'     => asset('img/profile-placeholder.png')
        ]);

        User::create([
            'firstname' => 'Oyebanji',
            'lastname'  => 'Jacob',
            'username'  => 'pyjacAdmin',
            'email'     =>  'oyebanji05@andela.com',
            'password'  => bcrypt('jacobu'),
            'role'      => 'admin',
            'image'     => asset('img/profile-placeholder.png')
        ]);
    }
}
