@extends('layouts.admin')
@section('content')

    <div class="col s12">
        <nav class="blue-grey darken-2">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="/admin" class="breadcrumb">Admin</a>
                    <a href="/admin/articles" class="breadcrumb">Articles</a>
                    <a href="/admin/articles/create" class="breadcrumb">Create</a>
                </div>
            </div>
        </nav>
    </div>

    @include('admin.articles.form')
@endsection