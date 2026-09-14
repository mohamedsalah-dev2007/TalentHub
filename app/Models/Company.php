<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'description',
        'location',
    ];

    public function jobs()
    {
        return $this->hasMany(JobListing::class);
    }
}