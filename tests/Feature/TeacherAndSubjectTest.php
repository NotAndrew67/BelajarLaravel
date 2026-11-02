<?php

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('subject model, factory, and seeder can generate 10 subjects', function () {
    $subjects = Subject::factory(10)->create();

    expect($subjects)->toHaveCount(10);
    expect(Subject::count())->toBe(10);

    $first = $subjects->first();
    expect($first->name)->toBeString();
});

test('teacher model, factory, and seeder can generate 10 teachers with valid columns', function () {
    $teachers = Teacher::factory(10)->create();

    expect($teachers)->toHaveCount(10);
    expect(Teacher::count())->toBe(10);

    $first = $teachers->first();
    expect($first->name)->toBeString();
    expect((string) $first->niy)->toHaveLength(10);
    expect($first->subjects)->toBeString();
    expect($first->start_date)->not->toBeNull();
});

test('admin subject routes are accessible and display data', function () {
    Subject::factory(10)->create();

    $response = $this->get(route('admin.subject'));
    $response->assertStatus(200);
    $response->assertSee('Subjects');

    $responsePlural = $this->get(route('admin.subjects'));
    $responsePlural->assertStatus(200);
});

test('admin teacher routes are accessible and display data', function () {
    Teacher::factory(10)->create();

    $response = $this->get(route('admin.teacher'));
    $response->assertStatus(200);
    $response->assertSee('Teachers');

    $responsePlural = $this->get(route('admin.teachers'));
    $responsePlural->assertStatus(200);
});

test('sidebar contains links to teachers and subjects', function () {
    $response = $this->get(route('admin.dashboard'));
    $response->assertStatus(200);
    $response->assertSee('/admin/teachers');
    $response->assertSee('/admin/subjects');
});
