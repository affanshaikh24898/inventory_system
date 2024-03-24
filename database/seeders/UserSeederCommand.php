<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeederCommand extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert users
        User::create([
            'name' => 'affan',
            'email' => 'affanshaikh24898@gmial.com',
            'password' => bcrypt('12345678'),
        ]);

        // Add more users as needed...
    }
}
