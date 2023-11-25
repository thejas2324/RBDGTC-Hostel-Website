<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application_data extends Model
{
    use HasFactory;
    protected $guarded = [];
    function student_basedata()
    {
        return $this->belongsTo(student_basedata::class, 's_id');
    }
}
