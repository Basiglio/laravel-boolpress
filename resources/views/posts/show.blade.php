@extends('layout.main')


{{-- @dd($postAttributes) --}}
{{-- @dd($post) --}}

@section('header_content')
    <h1 class="text-center">{{ $postAttributes['title'] }}</h1>
@endsection

@section('main_content')
    <h2 class="text-center">{{ $postAttributes['subtitle'] }}</h2>
    @foreach ($post->tags as $tag)
    {{-- SELEZIONO LA TABELLA PONTE E PRENDO IL TAG --}}
        <h4>{{ $tag->name }}</h4>
    @endforeach
    <h3 class="text-center">{{ $postAttributes['author'] }}</h3>
    <h4 class="text-center">{{ $postAttributes['created_at'] }}</h4>
    <p class="text-center">{{ $postAttributes['text'] }}</p>
@endsection
