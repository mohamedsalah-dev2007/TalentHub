<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'description',
        'location',
        'salary',
        'job_type',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}