<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pinch;

class PinchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Sample data:
        $users = User::count() < 10
                    ? collect([
                        User::create([
                            'name' => 'Alice Developer',
                            'email' => 'alice@example.com',
                            'password' => bcrypt('password'),
                        ]),
                        User::create([
                            'name' => 'Bob Builder',
                            'email' => 'bob@example.com',
                            'password' => bcrypt('password'),
                        ]),
                        User::create([
                            'name' => 'Charlie Coder',
                            'email' => 'charlie@example.com',
                            'password' => bcrypt('password'),
                        ]),
                    ])
                    : User::take(3)->get();
        //Messages:
        $pinches = [
            'Just discovered Laravel - where has this been all my life? 🚀',
            'Building something cool with Chirper today!',
            'Laravel\'s Eloquent ORM is pure magic ✨',
            'Deployed my first app with Laravel Cloud. So smooth!',
            'Who else is loving Blade components?',
            'Friday deploys with Laravel? No problem! 😎',
        ];

        foreach ($pinches as $message){
            $users->random()->pinches()->create([
                'message' => $message,
                'created_at' => now()->subMinutes(rand(5,1440)),
            ]);
        }

    }
}
