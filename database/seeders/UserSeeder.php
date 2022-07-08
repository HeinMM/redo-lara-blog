<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Aung Myat Admin',
            'email' => 'a@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('asdffdsa')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Text Editor',
            'email' => 'te@gmail.com',
            'role' => 'editor',
            'password' => Hash::make('asdffdsa')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Text Author',
            'email' => 'ta@gmail.com',
            'role' => 'author',
            'password' => Hash::make('asdffdsa')
        ]);

    }
}
