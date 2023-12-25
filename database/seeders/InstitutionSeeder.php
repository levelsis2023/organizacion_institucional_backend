<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    public function run()
    {
        $this->generateInstitutions(null, 1, 7);
    }

    private function generateInstitutions($parent, $level, $maxLevel)
    {
        if ($level > $maxLevel) {
            return;
        }

        $count = rand(1, 3);

        for ($i = 0; $i < $count; $i++) {
            $institution = Institution::factory()->create([
                'parent_id' => $parent ? $parent->id : null,
                'name' => 'Institution ' . ($parent ? $parent->id . '.' : '') . ($i + 1),
            ]);

            $this->generateInstitutions($institution, $level + 1, $maxLevel);
        }
    }
}
