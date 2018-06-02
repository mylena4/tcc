<?php

use Illuminate\Database\Seeder;
use App\User;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //factory(App\User::class, 10)->create()->each(function () {});

    	User::create([
            'name' => 'Mylena',
            'email' => 'mylena@email.com',
            'password' => bcrypt('123456'),
            'status' => 1,
        ]);
        
        User::create([
            'name' => 'Zeus',
            'email' => 'zeus@email.com',
            'password' => bcrypt('123456'),
            'status' => 1,
        ]);
    }
}
