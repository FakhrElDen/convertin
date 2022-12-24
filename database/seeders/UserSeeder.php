<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
        User::factory(10000)->create()->each(function ($user) {
            $user->assignRole('user');
        });;

        User::factory()->create([
            'name'              => 'user',
            'email'             => Str::random(8).'@convertin.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
        ]);
    }
}
