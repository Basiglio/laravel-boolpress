@extends('layout.main')

@dd($posts->comments)
@section('header_content')
<h1 class='text-center mt-5'>i miei post</h1>
@endsection

@section('main_content')

    <table class="table">
        <thead>
            <tr>
                <td>Titolo</td>
                <td>Sottotitolo</td>
                <td>Autore</td>
                <td>Post Status</td>
                <td>Ultimo Commento</td>
                <td>Ultimo Utente che ha Commentato</td>
            </tr>
        </thead>
        <tbody>
            <tr></tr>
            @foreach ($posts as $post)

                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->subtitle }}</td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->info_post->post_status }}</td>
                    {{-- ULTIMO COMMENTO --}}

                    {{-- @if (empty($post->comments) == true)
                        <td>Nessun commento </td>
                    @else

                    @endif --}}
                    <td>{{ $post->getLastComment()->text }}</td>
                    {{-- ULTIMO AUTORE COMMENTO --}}
                    {{-- <td>{{ $post->getLastComment()->author }}</td> --}}
                    {{-- <td>{{ $post->comments[count($post->comments) - 1]->text }}</td> --}}
                    {{-- <td>{{ end($post->comments)->text }}</td> --}}
                    {{-- <td>{{ $post->comments['6']->text }}</td> --}}
                    {{-- ULTIMO COMMENTO UTENTE --}}
                    {{-- <td>{{ $post->comments['6']->author }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('footer_content')
    <a class="btn btn-primary" href="{{ route('posts.create')}}">Aggiungi Post</a>
@endsection
