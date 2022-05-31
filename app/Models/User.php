<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'Address',
        'bio',
        'degree',
        'specialization',
        'photo',
        'prof_id',
        'hospital_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function DoctorAppointment()
    {
        return $this->hasMany('App\Models\Appointment','doctor_id');
    }

    public function profission()
    {
        return $this->belongsTo('App\Models\Profession','prof_id');
    }


    public function Hospital()
    {
        return $this->belongsTo('App\Models\Hospital','hospital_id');
    }

    public function Clinic()
    {
        return $this->hasOne('App\Models\Clinic');
    }


    public function patientAppointment()
    {
        return $this->belongsToMany('App\Models\Appointment', 'user_appointment', 'user_id', 'appointment_id');
    }
}
