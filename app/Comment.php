<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function recepie() {
        return $this->belongsTo('App\Recepie');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }


}
