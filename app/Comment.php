<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;


    // TABELLA SECONDARIA
    public function post()
    {

        // funzione al quale passo il namespace da associare
        // THIS è LA CLASSE DEFINITA NEL MODEL
        return $this->belongsTo('App\Post');
    }
}
