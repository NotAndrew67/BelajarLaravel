<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = Subject::all();
        if ($subjects->isEmpty()) {
            $subjects = Subject::factory(10)->create();
        }

        foreach ($subjects as $subject) {
            Teacher::firstOrCreate(
                ['subject_id' => $subject->id],
                Teacher::factory()->raw(['subject_id' => $subject->id])
            );
        }
    }
}
