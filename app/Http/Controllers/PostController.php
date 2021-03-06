<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// INCLUDO IL MODEL
use App\Post;
use App\InfoPost;
use App\Comment;
use App\Tag;


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
        $comments = Comment::all();

        return view('posts.index', compact('posts'), compact('comments') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $infoPost = InfoPost::all();
        $tags = Tag::all();
        // RITORNO LA VISTA CREATE
       return view('posts.create', compact('infoPost'), compact('tags'));
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
        // dd($data);

        // DEFINISCO VALIDAZIONE
        $request -> validate([
            'title' => 'required',
            'subtitle' => 'required',
            'author' => 'required',
            'text' => 'required',
            'post_status' => 'required',
        ]);

        // CREO NUOVO OGGETTO ISTANZA DI CLASSE POST e INFO POST
        $newPost = new Post;
        $newInfoPost = new InfoPost;

        // ASSOCIO I DATI PRESI DAL FORM ALLE CHIAVI DEL DATABASE
        $newPost->title = $data['title'];
        $newPost->subtitle = $data['subtitle'];
        $newPost->author = $data['author'];
        $newPost->text = $data['text'];
        // SALVO I DATI
        $newPost->save();

        // IL POST_ID DEVE AVERE L'ID DEL POST
        $newInfoPost->post_id = $newPost['id'];
        $newInfoPost->post_status = $data['post_status'];
        $newInfoPost->comment_status = $data['comment_status'];
        // dd($newInfoPost);

        // dd($newPost);
        // SALVO I DATI
        $infoPostResult = $newInfoPost->save();

        // SE IL SALVATAGGIO è ANDATO A BUON FINE
        if ($infoPostResult == true) {
            // SE L'ARRAY DATA CON CHIAVE 'TAGS' NON è VUOTO
            if (!empty($data['tags'])) {
                // FAI L'ATTACH
                $newPost->tags()->attach($data['tags']);
            }
        }


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
        // RITORNO ALLA VISTA LA SINGOLA ISTANZA DI CLASSE
        // CI PENSA LA MAGIA DI LARAVEL
        $postAttributes = $post->getAttributes();
        return view('posts.show', compact('postAttributes'), compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $infoPost = InfoPost::all();
        $tags = Tag::all();
        // RITORNO LA VISTA CREATE
        return view('posts.edit', compact('tags'), compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'author' => 'required',
            'text' => 'required',
            'post_status' => 'required',
        ]);

        $data = $request->all();
        $post->update($data);

        return redirect() -> route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post -> delete();


        return redirect() -> route('posts.index');
    }
}
