<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table ='faculty';

    protected $fillable = ['first_name', 'last_name', 'title', 'email', 'office', 'phone', 'image_url'];

}
