<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 
        'hire_date', 'job_id', 'salary', 'manager_id', 'department_id'
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(HrJob::class, 'job_id', 'job_id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    // Self-referencing relationship: The manager of this employee
    public function manager(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'manager_id', 'employee_id');
    }

    // Self-referencing relationship: Employees managed by this employee
    public function subordinates(): HasMany
    {
        return $this->hasMany(Employee::class, 'manager_id', 'employee_id');
    }

    public function dependents(): HasMany
    {
        return $this->hasMany(Dependent::class, 'employee_id', 'employee_id');
    }
}