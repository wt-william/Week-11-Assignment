<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'admin',
            'first_name' => 'Admin1',
            'last_name' => 'User1',
            'email' => 'admin1@test.com',
            'password' => '$2y$10$pRpP/biu8IHkmUFwcRiVdO/AZczif55e/STJEp09xHIIwgRkrl.u2'
        ]);
    }
}
