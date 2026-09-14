<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = [
        'user_id',
        'job_listing_id',
        'resume',
        'cover_letter',
        'status',
    ];

    // علاقة الطلب بالمستخدم (المتقدم)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة الطلب بالوظيفة
    public function jobListing()
    {
        return $this->belongsTo(JobListing::class, 'job_listing_id');
    }
}
