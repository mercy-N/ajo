<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\User::insert([

            'firstname' => 'TestUser',
            'lastname' => 'Lastname',
            'bvn' => '12334455',
            'dob' => '1999-06-02',
            'username' => 'TestUsername',
            'email' => 'username@test.com',
            'phone' => '08137658014',
            'password' => 'password',
        ]);
    }
}
