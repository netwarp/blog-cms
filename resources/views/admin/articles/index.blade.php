@extends('layouts.admin')
@section('content')
    <div class="ui three item stackable tabs menu">
        <a href="/admin/articles" class="item">Articles</a>
        <a href="/admin/articles/create" class="item">Créer nouveau</a>
        {{-- <a href="/admin/articles" class="item">Voir tout</a> --}}
        <label for="file" class="fluid ui button">
            <i class="file icon"></i>
            Open File</label>
        <input type="file" id="file" style="display:none">
    </div>
    <?php if (Session::has('message_success')): ?>
        <div class="message green">
            {{ Session::get('message_success') }}
        </div>
    <?php endif; ?>
    <table class="ui celled table">
        <thead>
            <tr>
                <th>id</th>
                <th>titre</th>
                <th>image</th>
                <th>apercu</th>
                <th>commentaires</th>
                <th>Editer ou supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($articles)): ?>
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td><a href="/admin/articles/{{ $article->id }}">{{ $article->title }}</a></td>
                        <td><img src="{{ $article->image }}" alt="" width="120"></td>
                        <td>{{ $article->overview }}</td>
                        <td>{{ $article->nb_comments }}</td>
                        <td>
                            <a href="/admin/articles/{{$article->id}}" class="ui button blue mini" ><i class="edit icon"></i> Editer</a>
                            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="post" style="display: inline;">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="ui button red mini"><i class="trash outline icon"></i> Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
@stop