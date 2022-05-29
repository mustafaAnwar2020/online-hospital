<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $fillable = ['name','address','phone','bio','user_id'];


    public function user()
    {
        return $this->belongsToMany('App\Models\User','user_clinic','clinic_id','user_id');
    }
}
