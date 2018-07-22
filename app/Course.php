<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'code', 'description'];

    protected static function boot()
    {
        parent::boot();

        //when this model is deleted it's subsequent relations are also deleted.
        static::deleting(function($course){
            $course->preRequisites()->delete();
        });
    }

    public function preRequisites(){
        return $this->belongsToMany(PreRequisites::class,'course_prerequisites' ,'prerequisite_id', 'course_id');
    }
}
