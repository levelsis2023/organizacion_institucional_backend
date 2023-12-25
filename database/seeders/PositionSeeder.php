<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Position;
use Database\Factories\PositionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run()
    {
        $areas = Area::all();

        foreach ($areas as $area) {
            $this->generatePositions($area, 1, 7);
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
