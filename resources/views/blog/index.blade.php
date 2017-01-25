@extends('layouts.app')

@section('content')
@foreach($articles as $article)
	<div class="panel panel-default">
	    <div class="panel-body">
	    	<h2><a href="/article/{{ $article->id }}/{{ $article->slug }}">{{ $article->title }}</a></h2>
		    <p>
		    	<small class="glyphicon glyphicon-calendar"></small> {{ date('d F Y', strtotime($article->created_at)) }}
		    	<span class="pull-right"><small class="glyphicon glyphicon-comment"></small> 0 commentaires</span>
		    </p>
	    </div>
	    <a href="/article/{{ $article->id }}/{{ $article->slug }}"><img class="img-responsive" src="{{ $article->image }}" alt=""></a>
	    <div class="panel-body">
	    	{!! $article->overview !!}

	    	<a href="/article/{{ $article->id }}/{{ $article->slug }}" class="btn btn-primary">Lire plus <span class="glyphicon glyphicon-chevron-right"></span></a>
	    </div>
	</div>
@endforeach
<ul class="pager">
    <li class="previous">
        <a href="{{ $articles->previousPageUrl() }}">← Plus ancien</a>
    </li>
    <li class="next">
        <a href="{{ $articles->nextPageUrl() }}">Plus récent →</a>
    </li>
</ul>
@endsection