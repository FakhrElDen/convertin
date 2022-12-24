<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create()->each(function ($user) {
            $user->assignRole('admin');
        });;

        User::factory()->create([
            'name'              => 'admin',
            'email'             => Str::random(8).'@convertin.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
        ]);

    }
}
