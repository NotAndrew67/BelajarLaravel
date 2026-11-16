<?php

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('classroom crud operations work correctly', function () {
    // 1. Index
    $classroom = Classroom::factory()->create(['name' => 'X PPLG 1', 'major' => 'PPLG']);
    $response = $this->get(route('admin.classroom'));
    $response->assertStatus(200);
    $response->assertSee('X PPLG 1');

    // 2. Create Page
    $response = $this->get(route('admin.classroom.create'));
    $response->assertStatus(200);
    $response->assertSee('Tambah Classroom');

    // 3. Store
    $response = $this->post(route('admin.classroom.store'), [
        'name' => 'XI PPLG 2',
        'major' => 'PPLG',
    ]);
    $response->assertRedirect(route('admin.classroom'));
    expect(Classroom::where('name', 'XI PPLG 2')->exists())->toBeTrue();

    // 4. Edit Page
    $newClass = Classroom::where('name', 'XI PPLG 2')->first();
    $response = $this->get(route('admin.classroom.edit', $newClass->id));
    $response->assertStatus(200);
    $response->assertSee('XI PPLG 2');

    // 5. Update
    $response = $this->put(route('admin.classroom.update', $newClass->id), [
        'name' => 'XI PPLG 2 Updated',
        'major' => 'PPLG Updated',
    ]);
    $response->assertRedirect(route('admin.classroom'));
    expect($newClass->fresh()->name)->toBe('XI PPLG 2 Updated');

    // 6. Destroy
    $response = $this->delete(route('admin.classroom.destroy', $newClass->id));
    $response->assertRedirect(route('admin.classroom'));
    expect(Classroom::where('id', $newClass->id)->exists())->toBeFalse();
});

test('student crud operations work correctly', function () {
    $classroom = Classroom::factory()->create();

    // 1. Index
    $student = Student::factory()->create(['classroom_id' => $classroom->id]);
    $response = $this->get(route('admin.student'));
    $response->assertStatus(200);
    $response->assertSee($student->name);

    // 2. Create Page
    $response = $this->get(route('admin.student.create'));
    $response->assertStatus(200);
    $response->assertSee('Tambah Student');

    // 3. Store
    $response = $this->post(route('admin.student.store'), [
        'nis' => '99988877',
        'name' => 'Budi Baru',
        'classroom_id' => $classroom->id,
        'address' => 'Jl. Anggrek',
    ]);
    $response->assertRedirect(route('admin.student'));
    expect(Student::where('nis', '99988877')->exists())->toBeTrue();

    // 4. Edit Page
    $newStudent = Student::where('nis', '99988877')->first();
    $response = $this->get(route('admin.student.edit', $newStudent->id));
    $response->assertStatus(200);
    $response->assertSee('99988877');

    // 5. Update
    $response = $this->put(route('admin.student.update', $newStudent->id), [
        'nis' => '99988877',
        'name' => 'Budi Diperbarui',
        'classroom_id' => $classroom->id,
        'address' => 'Jl. Mawar',
    ]);
    $response->assertRedirect(route('admin.student'));
    expect($newStudent->fresh()->name)->toBe('Budi Diperbarui');

    // 6. Destroy
    $response = $this->delete(route('admin.student.destroy', $newStudent->id));
    $response->assertRedirect(route('admin.student'));
    expect(Student::where('id', $newStudent->id)->exists())->toBeFalse();
});

test('subject crud operations work correctly', function () {
    // 1. Index
    $subject = Subject::factory()->create(['name' => 'Pemrograman Berorientasi Objek']);
    $response = $this->get(route('admin.subject'));
    $response->assertStatus(200);
    $response->assertSee('Pemrograman Berorientasi Objek');

    // 2. Create Page
    $response = $this->get(route('admin.subject.create'));
    $response->assertStatus(200);
    $response->assertSee('Tambah Subject');

    // 3. Store
    $response = $this->post(route('admin.subject.store'), [
        'name' => 'Kecerdasan Buatan',
    ]);
    $response->assertRedirect(route('admin.subject'));
    expect(Subject::where('name', 'Kecerdasan Buatan')->exists())->toBeTrue();

    // 4. Edit Page
    $newSub = Subject::where('name', 'Kecerdasan Buatan')->first();
    $response = $this->get(route('admin.subject.edit', $newSub->id));
    $response->assertStatus(200);
    $response->assertSee('Kecerdasan Buatan');

    // 5. Update
    $response = $this->put(route('admin.subject.update', $newSub->id), [
        'name' => 'Kecerdasan Buatan Modern',
    ]);
    $response->assertRedirect(route('admin.subject'));
    expect($newSub->fresh()->name)->toBe('Kecerdasan Buatan Modern');

    // 6. Destroy
    $response = $this->delete(route('admin.subject.destroy', $newSub->id));
    $response->assertRedirect(route('admin.subject'));
    expect(Subject::where('id', $newSub->id)->exists())->toBeFalse();
});

test('teacher crud operations work correctly', function () {
    $subject = Subject::factory()->create();

    // 1. Index
    $teacher = Teacher::factory()->create(['subject_id' => $subject->id]);
    $response = $this->get(route('admin.teacher'));
    $response->assertStatus(200);
    $response->assertSee($teacher->name);

    // 2. Create Page
    $response = $this->get(route('admin.teacher.create'));
    $response->assertStatus(200);
    $response->assertSee('Tambah Teacher');

    // 3. Store
    $response = $this->post(route('admin.teacher.store'), [
        'name' => 'Pak Guru Baru',
        'niy' => '1234567899',
        'subject_id' => $subject->id,
        'start_date' => '2024-01-15',
    ]);
    $response->assertRedirect(route('admin.teacher'));
    expect(Teacher::where('niy', '1234567899')->exists())->toBeTrue();

    // 4. Edit Page
    $newTeacher = Teacher::where('niy', '1234567899')->first();
    $response = $this->get(route('admin.teacher.edit', $newTeacher->id));
    $response->assertStatus(200);
    $response->assertSee('1234567899');

    // 5. Update
    $response = $this->put(route('admin.teacher.update', $newTeacher->id), [
        'name' => 'Pak Guru Baru M.Kom',
        'niy' => '1234567899',
        'subject_id' => $subject->id,
        'start_date' => '2024-02-01',
    ]);
    $response->assertRedirect(route('admin.teacher'));
    expect($newTeacher->fresh()->name)->toBe('Pak Guru Baru M.Kom');

    // 6. Destroy
    $response = $this->delete(route('admin.teacher.destroy', $newTeacher->id));
    $response->assertRedirect(route('admin.teacher'));
    expect(Teacher::where('id', $newTeacher->id)->exists())->toBeFalse();
});
