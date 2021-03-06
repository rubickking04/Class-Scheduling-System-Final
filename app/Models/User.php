<?php

namespace App\Models;

use App\Models\Schedule;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'middlename',
        'email',
        'address',
        'department',
        'course',
        'major',
        'semester',
        'age',
        'section',
        'curriculum_year',
        'student_type',
        'student_status',
        'civil_status',
        'studentId',
        'gender',
        'phone',
        'birth_date',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = [
        'deleted_at',
    ];
    public function studentSched(){
        return $this->hasMany(Schedule::class, 'user_id');
    }
}
