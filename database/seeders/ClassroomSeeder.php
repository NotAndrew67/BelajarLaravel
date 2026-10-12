<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $classrooms = [
            ['name' => 'X RPL 1',   'major' => 'Rekayasa Perangkat Lunak'],
            ['name' => 'X RPL 2',   'major' => 'Rekayasa Perangkat Lunak'],
            ['name' => 'XI RPL 1',  'major' => 'Rekayasa Perangkat Lunak'],
            ['name' => 'XI RPL 2',  'major' => 'Rekayasa Perangkat Lunak'],
            ['name' => 'XII RPL 1', 'major' => 'Rekayasa Perangkat Lunak'],
            ['name' => 'X TKJ 1',   'major' => 'Teknik Komputer & Jaringan'],
            ['name' => 'X TKJ 2',   'major' => 'Teknik Komputer & Jaringan'],
            ['name' => 'XI TKJ 1',  'major' => 'Teknik Komputer & Jaringan'],
            ['name' => 'XII TKJ 1', 'major' => 'Teknik Komputer & Jaringan'],
            ['name' => 'X DKV 1',   'major' => 'Desain Komunikasi Visual'],
        ];

        foreach ($classrooms as $data) {
            Classroom::create($data);
        }
    }
}
