<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HrJob extends Model
{
    // Tell Laravel we are using the hr_jobs table
    protected $table = 'hr_jobs';
    protected $primaryKey = 'job_id';
    protected $fillable = ['job_title', 'min_salary', 'max_salary'];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'job_id', 'job_id');
    }
}