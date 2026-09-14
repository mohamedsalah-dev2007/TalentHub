<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // علاقة المستخدم بطلبات التوظيف الخاصة به (لو كان موظف/باحث عن عمل)
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    // علاقة المستخدم بالشركات الخاصة به (لو كان صاحب عمل)
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}