@extends('layouts.app')

@section('title', 'О блоге')

@section('content')
<h1>Список статей</h1>
    @foreach ($articles as $article)
        <h2><a href="{{ route('articles.show', $article->id) }}">{{ $article->name }}</a></h2>
        <div>
            {{Str::limit($article->body, 200)}}
            <a href="{{ route('articles.edit', $article->id) }}">edit</a>
            <a href="{{ route('articles.destroy', $article->id) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
        </div>
    @endforeach
    {{ $articles->links() }}
@endsection
