<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['listar usuarios', 'user.index'],
            ['crear usuarios', 'user.create'],
            ['actualizar usuarios', 'user.update'],
            ['borrar usuarios', 'user.destroy'],
        ];

        foreach ($data as $key => $value) {
            Permission::create([
                'name' => $value[0],
                'show' => $value[1],
            ]);
        }
    }
}
