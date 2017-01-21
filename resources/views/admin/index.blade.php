@extends('layouts.admin')

@section('content')
    <div class="col s12">
        <nav class="blue-grey darken-2">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="{{ route('admin.index') }}" class="breadcrumb">Admin</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <div class="col s6">
            <div class="card">
                <div class="card-content">
                    <h5>Statistiques</h5>
                    <table class="bordered striped" >
                        <tbody>
                            <tr>
                                <td><a href="#">{{ $articles_count }} articles</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">{{ $comments_count }} commentaires</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">{{ $messages_count }} messages</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="card">
                <div class="card-content">
                    <h5>Derniers articles</h5>
                    <table class="bordered striped">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($last_articles as $article)
                                <tr>
                                    <td><a href="{{ route('admin.articles.edit', $article->id) }}">{{ $article->title }}</a></td>
                                    <td>{{ date('d F Y', strtotime($article->created_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s6">
            <div class="card">
                <div class="card-content">
                    <h5>Derniers commentaires</h5>
                    <table class="bordered striped">
                        <tbody>
                            @foreach($last_comments as $comment)
                                <tr>
                                    <td>
                                        <p>{{ $comment->content }}</p>
                                        <div>{{ $comment->name }}</div>
                                        <div>{{ $comment->email }}</div>
                                        <div><a href="{{ route('admin.articles.show', $comment->article_id) }}">{{ $comment->article_id }}</a></div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="card">
                <div class="card-content">
                    <h5>Derniers messages</h5>
                    <table class="bordered striped">
                        <tbody>
                            @foreach($last_messages as $message)
                                <tr>
                                    <td>
                                        <p>{{ $message->content }}</p>

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