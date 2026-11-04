<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $classrooms = [
            ['name' => 'X PPLG 1',    'major' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['name' => 'X PPLG 2',    'major' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['name' => 'XI PPLG 1',   'major' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['name' => 'XI PPLG 2',   'major' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['name' => 'X DKV 1',     'major' => 'Desain Komunikasi Visual'],
            ['name' => 'X DKV 2',     'major' => 'Desain Komunikasi Visual'],
            ['name' => 'XI DKV 1',    'major' => 'Desain Komunikasi Visual'],
            ['name' => 'XI DKV 2',    'major' => 'Desain Komunikasi Visual'],
            ['name' => 'X Animasi 1', 'major' => 'Animasi'],
            ['name' => 'X Animasi 2', 'major' => 'Animasi'],
            ['name' => 'XI Animasi 1','major' => 'Animasi'],
            ['name' => 'XI Animasi 2','major' => 'Animasi'],
        ];

        foreach ($classrooms as $data) {
            Classroom::create($data);
        }
    }
}
