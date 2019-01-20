<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'name'=>'admin',
        	'password'=>bcrypt('admin'),
        	'email'=>'admin@email.com',
        	'admin'=>1,
        	'avatar'=>asset('avatars/boy_avatar.png')

        ]);
    }
}
