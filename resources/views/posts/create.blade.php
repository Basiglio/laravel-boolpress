@extends('layout.main')

@section('header_content')
    <h1>Aggiungi Post</h1>
@endsection

@section('main_content')
    <form action="{{route('posts.store')}}" method="post">
      @csrf
      @method('POST')
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="title">Titolo</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Inserisci Titolo Post" value="{{old('title')}}">
        </div>
        <div class="form-group col-md-6">
          <label for="subtitle">Sottotitolo</label>
          <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Inserisci il Sottotitolo" value="{{old('subtitle')}}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="author">Autore</label>
          <input type="text" class="form-control" name="author" id="author" placeholder="Inserisci Titolo Post" value="{{old('author')}}">
        </div>
      </div>
        <div class="form-group">
            <label for="text">Scrivi il Post</label>
            <textarea class="form-control" name="text" id="text" placeholder="Scrivi il tuo Post" rows="5" value="{{old('text')}}"></textarea>
        </div>
        <div class="form-group col-md-6">
          <label for="post_status">Titolo</label>
          <select name="post_status" id="post_status">
              <option value="{{old('public')}}">Pubblico</option>
              <option value="{{old('private')}}">Privato</option>
              <option value="{{old('draft')}}">Draft</option>
          </select>
        </div>
      <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection

@section('footer_content')
    <a class="btn btn-warning mt-5" href="{{route('posts.index')}}" id="back_btn">INDIETRO</a>
@endsection
