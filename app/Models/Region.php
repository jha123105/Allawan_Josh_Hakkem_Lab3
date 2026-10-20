<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $primaryKey = 'region_id';
    protected $fillable = ['region_name'];

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class, 'region_id', 'region_id');
    }
}