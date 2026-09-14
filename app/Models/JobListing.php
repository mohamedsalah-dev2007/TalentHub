<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company_id',
        'location',
        'salary',
        'job_type',
        'description',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
