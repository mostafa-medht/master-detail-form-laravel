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
        $user = App\User::create([
            'name'=> 'Mostafa Medht',
            'email'=> 'mostafamedht98@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
