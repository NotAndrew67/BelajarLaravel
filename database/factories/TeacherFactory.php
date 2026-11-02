<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'niy' => fake()->numberBetween(1000000000, 9999999999),
            'subjects' => fake()->randomElement([
                'Matematika',
                'Bahasa Indonesia',
                'Bahasa Inggris',
                'Pemrograman Web',
                'Basis Data',
                'Pendidikan Agama Islam',
                'Pendidikan Jasmani & Kesehatan',
                'Sejarah Indonesia',
                'Informatika',
                'Projek Kreatif dan Kewirausahaan',
            ]),
            'start_date' => fake()->date(),
        ];
    }
}
