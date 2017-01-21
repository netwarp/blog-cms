@extends('layouts.admin')

@section('content')

	<div class="col s12">
		<nav class="blue-grey darken-2">
			<div class="nav-wrapper">
				<div class="col s12">
					<a href="/admin" class="breadcrumb">Admin</a>
					<a href="/admin/articles" class="breadcrumb">Articles</a>
				</div>
			</div>
		</nav>
	</div>

	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<h4>Articles</h4>
					  <a href="/admin/articles/create" class="btn-floating waves-effect waves-light teal lighten-1"><i class="material-icons">add</i></a>


					<table class="bordered">
						<thead>
				            <tr>
				                <th>Id</th>
				                <th>Titre</th>
				                <th>Image</th>
				                <th>Apercu</th>
				                <th>Commentaires</th>
				                <th>Action</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($articles as $article)
								<tr>
	                		        <td>{{ $article->id }}</td>
			                        <td><a href="/admin/articles/{{ $article->id }}">{{ $article->title }}</a></td>
			                        <td><img src="{{ $article->image }}" alt="" width="120"></td>
			                        <td>{!! $article->overview !!}</td>
			                        <td>{{ $article->nb_comments }}</td>
			                        <td>
			                            <a href="/admin/articles/{{$article->id}}" class="btn  blue lighten-1" ><i class="edit icon"></i> Editer</a>
			                            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="post" style="display: inline;">
			                                {{ csrf_field() }}
			                                <input name="_method" type="hidden" value="DELETE">
			                                <button type="submit" class="btn  red darken-3"><i class="trash outline icon"></i> Supprimer</button>
			                            </form>
			                        </td>
			                    </tr>
				        	@endforeach
				        </tbody>
					</table>
					<ul class="pagination">
					    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
					    <li class="active"><a href="#!">1</a></li>
					    <li class="waves-effect"><a href="#!">2</a></li>
					    <li class="waves-effect"><a href="#!">3</a></li>
					    <li class="waves-effect"><a href="#!">4</a></li>
					    <li class="waves-effect"><a href="#!">5</a></li>
					    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection