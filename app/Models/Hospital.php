<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $fillable = ['name','address','phone','bio','user_id'];



    public function user()
    {
        return $this->belongsToMany('App\Models\User','user_hospital','hospital_id','user_id');
    }

}