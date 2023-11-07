<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable = [
        'name',
        'email',
        'number',
        'total_credit',
        'department_head',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
