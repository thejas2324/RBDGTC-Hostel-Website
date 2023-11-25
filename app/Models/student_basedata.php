<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_basedata extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    function application_data()
    {
        return $this->hasMany(application_data::class, 's_id');
    }
}
