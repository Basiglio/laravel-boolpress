<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    public function posts() {
        // tra parentesi il namespace del model principale
        return $this->belongsToMany('App\Post');
    }
}
