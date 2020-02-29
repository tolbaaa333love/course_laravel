<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_image extends Model
{

    protected $fillable = ["image" , "project_id"];

    public function project(){

        return $this->belongsTo('App\Project');


    }


}
