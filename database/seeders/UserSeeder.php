<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            
            'name'     => "Unimed Fesp",
            'email'    => "contato@usp.br",
            'password' => bcrypt("teste"),
            
        ];
        User::create($user);
    }
}
