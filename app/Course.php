<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'content'
    ];

    public function students()
    {
        return $this->belongsToMany('App\User', 'course_student');
    }
}
