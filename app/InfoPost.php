<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPost extends Model
{
    // dico a laravel di fare la migrazione senza questa colonna
    public $timestamps = false;


    // TABELLA SECONDARIA
    public function post() {

        // funzione al quale passo il namespace da associare
        // THIS è LA CLASSE DEFINITA NEL MODEL
        return $this->belongsTo('App\Post');
    }
}
