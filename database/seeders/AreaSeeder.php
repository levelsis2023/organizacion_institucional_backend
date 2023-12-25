<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Institution;
use App\Models\Position;
use Database\Factories\PositionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    public function run()
    {
        $institutions = Institution::all();

        foreach ($institutions as $institution) {
            $this->generateAreas($institution, 1, 7);
        }
    }

    private function generateAreas($parent, $level, $maxLevel)
    {
        if ($level > $maxLevel) {
            return;
        }

        $count = rand(1, 3);

        for ($i = 0; $i < $count; $i++) {
            $area = Area::factory()->create([
                'institution_id' => $parent->id,
                'name' => 'Area ' . $parent->id . '.' . ($i + 1),
            ]);

            $this->generatePositions($area, $level + 1, $maxLevel);
        }
    }

    private function generatePositions($area, $level, $maxLevel)
    {
        if ($level > $maxLevel) {
            return;
        }

        $count = rand(1, 3);

        for ($i = 0; $i < $count; $i++) {
            PositionFactory::new()->create([
                'area_id' => $area->id,
                'name' => 'Position ' . $area->id . '.' . ($i + 1),
            ]);
        }
    }
}
