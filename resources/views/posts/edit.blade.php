@extends('layout.main')

{{-- @dd($post) --}}

@section('header_content')
    <h1>Modifica Post</h1>
@endsection


@section('main_content')
    <form action="{{route('posts.update', $post)}}" method="post">
      @csrf
      @method('PUT')
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="title">Titolo</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Inserisci Titolo Post" value="{{ $post->title }}">
        </div>
        <div class="form-group col-md-6">
          <label for="subtitle">Sottotitolo</label>
          <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Inserisci il Sottotitolo" value="{{ $post->subtitle }}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="author">Autore</label>
          <input type="text" class="form-control" name="author" id="author" placeholder="Inserisci Titolo Post" value="{{ $post->author }}">
        </div>
      </div>
        <div class="form-group">
            <label for="text">Scrivi il Post</label>
            <textarea class="form-control" name="text" id="text" placeholder="Scrivi il tuo Post" rows="5" value="{{ $post->text }}"></textarea>
        </div>
        <div class="form-group col-md-6">
          <label for="post_status">Stato del Post</label>
          <select name="post_status" id="post_status">
              <option value="public">Pubblico</option>
              <option value="private">Privato</option>
              <option value="draft">Draft</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="comment_status">Stato dei Commenti</label>
          <select name="comment_status" id="comment_status">
              <option value="public">Pubblico</option>
              <option value="private">Privato</option>
              <option value="draft">Draft</option>
          </select>
        </div>
         {{--  --}}
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>

@endsection
