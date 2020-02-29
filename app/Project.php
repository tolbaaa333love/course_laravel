<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    //defined fields allowed to filled

    protected $fillable = ["name" , "proj_desc" , "image"];

    //defined relathionship between developers and projects (many to many)

    public function devs(){

        return $this->belongsToMany('App\Dev');


    }

    public function project_images(){

        return $this->hasMany('App\Project_image');

    }
}
