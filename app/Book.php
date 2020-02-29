<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = ["title" , "book_desc" , "img" , "author_id"];

    public function author (){

        return $this->belongsTo('App\Author');

    }
}
