<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreRequisites extends Model
{

    protected $table = 'prerequisites';
    public $timestamps=false;
    protected $fillable = ['course_code'];


    public function course(){
        return $this->belongsToMany(Course::class, 'course_prerequisites', 'course_id', 'prerequisite_id');
    }
}
