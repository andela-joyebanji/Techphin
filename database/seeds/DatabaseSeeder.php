<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // $this->call(UsersTableSeeder::class);
        //factory('Resly\Booking', 5)->create();

        $this->call(UserSeeder::class);
        $this->call(VideoSeeder::class);
        Model::reguard();
    }
}
