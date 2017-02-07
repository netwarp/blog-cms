@extends('layouts.app')

@section('content')
<div class="panel panel-default" id="article-content">
	@if(!empty($article->image))
		<img src="{{ $article->image }}" alt="" class="img-responsive">
	@endif
	<div class="panel-body">
		<article>
		<h1>{{ $article->title }}</h1>
		<br>
		@markdown($article->content)
		<hr>
		<div>
			{{ date('d F Y', strtotime($article->created_at)) }}
		</div>
		</article>
	</div>
</div>

<div class="panel panel-default" id="form-commment">
	<div class="panel-heading"><span class="h4">Commentaires</span></div>
	<div class="panel-body">
		@if (session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@else
			<div class="alert alert-info">
				Bien que nous soyons partisans d'une liberté d'expression totale, nous rappelons à nos lecteurs que l'éspace de commentaires n'est pas un défouloire et que la courtoisie y est de mise. <br>
				La modération.
			</div>
		@endif
		<form action="/article/{{ $article->id }}" method="POST">
			{{ csrf_field() }}
			<div class="col-md-6">
				<div class="form-group">
					<label for="name">Nom</label>
					<input type="text" class="form-control" name="name" placeholder="Nom">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" name="email" placeholder="Email">
				</div>
			</div>
			<div class="col-md-12">
				<label for="content">Contenu</label>
				<textarea name="content" class="form-control" rows="12"></textarea>
			</div>
			<div class="col-md-12">
				<br>
				<button type="submit" class="btn btn-success pull-right">Envoie</button>
			</div>
		</form>
	</div>
</div>

@foreach($comments as $comment)
	<div class="jumbotron">
		<div class="container-fluid">
			<div >
				<b>{{ $comment->name }}</b>
				<small>&nbsp; {{ date('d F Y', strtotime($article->created_at)) }}</small>
			</div>
			<div>
				{{ $comment->content }}
			</div>
			<div>
				<a href="#form-commment" class="btn btn-primary btn-sm pull-right">Répondre</a>
			</div>
		</div>
	</div>
@endforeach

@endsection