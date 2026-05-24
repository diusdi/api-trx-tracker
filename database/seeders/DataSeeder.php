<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Item;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => Str::orderedUuid(),
                'name' => 'ADMIN',
                'username' => 'admin',
                'password' => Hash::make('qweasdzx'),
                'remember_token' => Str::random(10),
                'role' => 'admin',
            ],
            [
                'id' => Str::orderedUuid(),
                'name' => 'USER 1',
                'username' => 'user1',
                'password' => Hash::make('qweasdzx'),
                'remember_token' => Str::random(10),
                'role' => 'user',
            ],
            [
                'id' => Str::orderedUuid(),
                'name' => 'USER 2',
                'username' => 'user2',
                'password' => Hash::make('qweasdzx'),
                'remember_token' => Str::random(10),
                'role' => 'user',
            ]
        ];

        $categories = [
            [
                'id' => Str::orderedUuid(),
                'name' => 'GAJI',
                'type' => 'DEFAULT',
            ],
            [
                'id' => Str::orderedUuid(),
                'name' => 'MAKANAN',
                'type' => 'DEFAULT',
            ],
            [
                'id' => Str::orderedUuid(),
                'name' => 'TRANSPORTASI',
                'type' => 'DEFAULT',
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }

        foreach ($categories as $key => $category) {
            Category::create($category);
        }
    }
}
