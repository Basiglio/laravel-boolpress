<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// INCLUDO IL MODEL
use App\Post;
use App\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // RITORNO ALLA VISTA LA PAGINA
        $posts = Post::all();

        return view('posts.index', compact('posts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // RITORNO LA VISTA CREATE
       return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // CREO VARIABILE
        $data = $request->all();

        // DEFINISCO VALIDAZIONE

        $request -> validate([
            'title' => 'required',
            'subtitle' => 'required',
            'author' => 'required',
            'text' => 'required',
        ]);

        // CREO NUOVO OGGETTO ISTANZA DI CLASSE POST
        $newPost = new Post;

        // ASSOCIO I DATI PRESI DAL FORM ALLE CHIAVI DEL DATABASE

        $newPost->title = $data['title'];
        $newPost->title = $data['subtitle'];
        $newPost->title = $data['author'];
        $newPost->title = $data['text'];

        // SALVO I DATI
        $newPost->save();

        // FACCIO IL REDIRECT ALL'INDEX
        return redirect() -> route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
