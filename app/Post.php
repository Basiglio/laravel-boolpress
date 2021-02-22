<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
        "id",
        "title",
        "subtitle",
        "author",
        "text",
	];

    // metodo che recupera le informazioni della tabella info_post
    // TABELLA PRINCIPALE
    public function info_post() {

        // funzione al quale passo il namespace da associare
        // THIS è LA CLASSE DEFINITA NEL MODEL
        return $this->hasOne('App\InfoPost');
    }
    public function comments() {

        // funzione al quale passo il namespace da associare
        // THIS è LA CLASSE DEFINITA NEL MODEL
        return $this->hasMany('App\Comment');
    }
    public function tags()
    {
        // funzione al quale passo il namespace da associare
        // THIS è LA CLASSE DEFINITA NEL MODEL
        // tra parentesi il namespace del model principale
        return $this->belongsToMany('App\Tag');
    }

    public function getLastComment() {
        return $this->comments[count($this->comments)- 1];
        // $comments = $this->comments;
        // $len = count($comments);
        // return $comments[$len - 1];
    }



}
