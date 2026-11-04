<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'name',
    ];

    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class, 'subject_id');
    }
}
