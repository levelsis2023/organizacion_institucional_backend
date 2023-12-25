<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'admin@gmail.com',
            'password' => 'admin1234',
        ]);
        $permissions = Permission::pluck('id')->toArray();
        $user->permissions()->attach($permissions);
    }
}
