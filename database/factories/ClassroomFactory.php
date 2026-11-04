<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grade = fake()->randomElement(['X', 'XI']);
        $majorData = fake()->randomElement([
            ['code' => 'PPLG', 'major' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['code' => 'DKV', 'major' => 'Desain Komunikasi Visual'],
            ['code' => 'Animasi', 'major' => 'Animasi'],
        ]);
        $number = fake()->numberBetween(1, 2);

        return [
            'name' => "{$grade} {$majorData['code']} {$number}",
            'major' => $majorData['major'],
        ];
    }
}
