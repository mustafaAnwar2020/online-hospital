<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;

    protected $fillable =['name','image'];

    public function user()
    {
        return $this->belongsToMany('App\Models\User','user_profession','prof_id','user_id');
    }
}
