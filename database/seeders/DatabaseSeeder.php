<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Area;
use App\Models\Institution;
use App\Models\Position;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // InstitutionSeeder::class,
            // AreaSeeder::class,
            // PositionSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
        ]);

        // Institution::factory(1)->create()->each(function ($mainInstitution) {
        //     $this->createHierarchy($mainInstitution, 7); // Establece el nivel de jerarquía deseado
        // });
        // Institution::factory(10)->create()->each(function ($institution) {
        //     Area::factory(10)->create(['parent_id' => $institution->id])->each(function ($area) {
        //         Position::factory(10)->create(['area_id' => $area->id]);
        //     });
        // });

        // factory(App\Institution::class, 10)->create()->each(function ($institution) {
        //     factory(App\Area::class, rand(1, 3))->create(['parent_id' => $institution->id])->each(function ($area) {
        //         factory(App\Position::class, rand(1, 5))->create(['area_id' => $area->id]);
        //     });
        // });
    }

    // protected function createHierarchy($parentInstitution, $depth)
    // {
    //     if ($depth === 0) {
    //         return;
    //     }

    //     Institution::factory(rand(1, 3))->create(['parent_id' => $parentInstitution->id])->each(function ($institution) use ($depth) {
    //         $this->createHierarchy($institution, $depth - 1);

    //         Area::factory(rand(1, 3))->create(['parent_id' => $institution->id])->each(function ($area) {
    //             Position::factory(rand(1, 5))->create(['area_id' => $area->id]);
    //         });
    //     });
    // }
}
