@extends('layout.main')

{{-- @dd($posts) --}}
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
                    <td>{{ $post->comments['0']->text }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
