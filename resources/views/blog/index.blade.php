@extends('layouts.app')

@section('content')
	@if($articles->count() == 0)
		<div class="alert alert-warning">
			Aucun article ne semble correspondre à votre recherche. <br>
			Le moteur de recherhce de Google pourra sans doute vous être plus utile.

		</div>
	@endif
	@foreach($articles as $article)
		<div class="panel panel-default">
		    <div class="panel-body">
		    	<h2><a href="/article/{{ $article->id }}/{{ $article->slug }}">{{ $article->title }}</a></h2>
			    <p>
			    	<small class="glyphicon glyphicon-calendar"></small> {{ date('d F Y', strtotime($article->created_at)) }}
			    	<span class="pull-right"><small class="glyphicon glyphicon-comment"></small> {{ $article->nb_comments }} commentaire{{ $article->nb_comments >1 ? 's' : '' }}</span>
			    </p>
		    </div>
		    <a href="/article/{{ $article->id }}/{{ $article->slug }}"><img class="img-responsive" src="{{ $article->image }}" alt=""></a>
		    <div class="panel-body">
		    	{!! $article->overview !!}

		    	<a href="/article/{{ $article->id }}/{{ $article->slug }}" class="btn btn-primary">Lire plus <span class="glyphicon glyphicon-chevron-right"></span></a>
		    </div>
		</div>
	@endforeach
	@if($articles->count() > 5)
		<ul class="pager">
		    <li class="previous">
		        <a href="{{ $articles->previousPageUrl() }}">← Plus ancien</a>
		    </li>
		    <li class="next">
		        <a href="{{ $articles->nextPageUrl() }}">Plus récent →</a>
		    </li>
		</ul>
	@endif
@endsection