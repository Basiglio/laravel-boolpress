@extends('layout.main')


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
                {{-- @dd($post->comments) --}}
                <tr>
                    <td><a href="{{route('posts.show', $post->id)}}">{{ $post->title }}</a></td>
                    <td>{{ $post->subtitle }}</td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->info_post->post_status }}</td>
                    {{-- ULTIMO COMMENTO --}}
                    {{-- @dump(empty($post->commets)) --}}
                    @if ($post->comments->isEmpty() == true)
                         <td>Nessun commento</td>
                    @else
                        <td>{{ $post->getLastComment()->text}}</td>
                    @endif
                    {{-- ULTIMO AUTORE COMMENTO --}}
                    @if ($post->comments->isEmpty() == true)
                         <td>Nessun commento</td>
                    @else
                        <td>{{ $post->getLastComment()->author}}</td>
                    @endif
                    <td>
                        <a href="{{ route('posts.edit', $post->id)}}"><i class="far fa-edit"></i></a>
                    </td>
                    <td>
                        <form action="{{route('posts.destroy', $post)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick='return confirm("Sei sicuro di voler cancellare l&apos;elemento?")' type="submit" class="btn btn-warning"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>

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
