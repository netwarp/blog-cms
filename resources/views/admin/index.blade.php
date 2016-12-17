@extends('layouts.admin')

@section('content')
<h1>Bienvenue </h1>
    <h2>Derniers articles</h2>
    <table class="ui celled table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Image</th>
                <th>Apercu</th>
                <th>Nombre de commentaires</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        	@if(isset($articles))
	            <?php foreach ($articles as $article): ?>
	                <tr>
	                    <td><a href="/admin/articles/edit/{{ $article->id }}">{{ $article->id }}</a></td>
	                    <td>{{ $article->title }}</td>
	                    <td><img src="{{ $article->image }}" alt="" width="80" /></td>
	                    <td>{!! $article->overview !!}</td>
	                    <td>{{ $article->nb_comments }}</td>
	                    <td>{{ $article->created_at }}</td>
	                </tr>
	            <?php endforeach; ?>
            @endif
        </tbody>
    </table>
@endsection