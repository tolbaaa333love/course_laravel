<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dev extends Model
{

    //defined fields allowed to filled
    protected $fillable = ["name" , "email" , "image" , "special"];

    //defined relathionship between developers and projects (many to many)
    public function projects (){

        return $this->belongsToMany('App\Project');


    }
}
