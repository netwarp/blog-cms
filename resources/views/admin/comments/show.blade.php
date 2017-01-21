@extends('layouts.admin')

@section('content')
    <div class="col s12">
        <nav class="blue-grey darken-2">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="/admin" class="breadcrumb">Admin</a>
                    <a href="/admin/comments" class="breadcrumb">Comments</a>
                    <a href="/admin/comments" class="breadcrumb">Show</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4>Comments</h4>
                    <div>
                        <b>Name</b>:
                        {{ $comment->name }}
                    </div>
                    <div>
                        <b>Email</b>:
                        {{ $comment->email }}
                    </div>
                    <div>
                        <b>Content</b>:
                        {{ $comment->content }}
                    </div>
                    <div>
                        <b>Article</b>:
                        {{ $comment->article_id }}
                    </div>
                    <div>
                        <b>Date</b>:
                        {{ $comment->created_at }}
                    </div>
                    <div>
                        <b>Ip</b>:
                        {{ $comment->ip }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection