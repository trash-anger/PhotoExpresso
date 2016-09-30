<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'login' => 'admin',
            'email' => 'admin@essai.fr',
            'password' =>  bcrypt('admin'),
            'droit' => 'admin'
        ]);
    }
}
