<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable =['start_time','finish_time','price','doctor_id'];


    public function doctor()
    {
        return $this->belongsTo('App\Models\User','doctor_id');
    }

    /**
     * The user that belong to the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
        return $this->belongsToMany('App\Models\User', 'user_appointment', 'user_id', 'appointment_id');
    }
}
