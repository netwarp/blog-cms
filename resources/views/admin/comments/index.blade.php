@extends('layouts.admin')

@section('content')
<div class="col s12">
    <nav class="blue-grey darken-2">
        <div class="nav-wrapper">
            <div class="col s12">
                <a href="/admin" class="breadcrumb">Admin</a>
                <a href="/admin/comments" class="breadcrumb">Comments</a>
            </div>
        </div>
    </nav>
</div>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <table class="bordered stripped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Content</th>
                            <th>Article_id</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td><a href="{{ route('admin.comments.show', $comment->id) }}">{{ $comment->name }}</a></td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->content }}</td>
                            <td><a href="/admin/articles/{{ $comment->article_id }}">{{ $comment->article->title }}</a></td>
                            <td>
                                <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">

                                    <button type="submit" class="btn red darken-3"><i class="trash outline icon"></i> Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection