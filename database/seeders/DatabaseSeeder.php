<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
        ]);

        // Student::factory(20)->create();

        // Classroom::factory(20)->create();

        Classroom::factory(10)
            ->hasStudents(5)
            ->create();  

        $subjects = Subject::factory(10)->create();

        foreach ($subjects as $subject) {
            Teacher::factory()->create([
                'subject_id' => $subject->id,
            ]);
        }
    }
}
