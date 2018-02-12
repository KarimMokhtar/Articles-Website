<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    //
    protected $fillable = ['path'];

    protected $upload = '/images/';

    public function getPathAttribute($photo){
    	return $this->upload.$photo;
    }
}
