<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Matematika',
                'Bahasa Indonesia',
                'Bahasa Inggris',
                'Pemrograman Web',
                'Basis Data',
                'Pendidikan Agama Islam',
                'Pendidikan Jasmani & Kesehatan',
                'Sejarah Indonesia',
                'Fisika',
                'Kimia',
                'Biologi',
                'Seni Budaya',
                'Informatika',
                'Projek Kreatif dan Kewirausahaan',
                'Bimbingan Konseling',
            ]),
        ];
    }
}
