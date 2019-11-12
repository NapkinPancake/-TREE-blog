<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Story extends Model
{

     // Table name 
     protected $table = 'stories';

    public function user() {
        return $this->belongsTo('App\User');
    }
}
