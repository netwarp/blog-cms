@extends('layouts.app')

@section('content')
<div class="panel panel-default" id="article-content">
	<img src="{{ $article->image }}" alt="" class="img-responsive">
	<div class="panel-body">
		
		<h1>{{ $article->title }}</h1>
		{!! $article->overview !!}
		<br>
		{!! $article->content !!}
		<div>
			{{ $article->created_at }}
		</div>
	</div>
</div>
<script>
    document.querySelectorAll('#article-content img').forEach(function(image) {
        image.classList.add('img-responsive')
    })
</script>
@endsection