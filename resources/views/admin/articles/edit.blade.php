@extends('layouts.admin')

@section('content')
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"
              integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="
              crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.10/jquery.tinymce.min.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.10/plugins/image/plugin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.10/plugins/paste/plugin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.10/plugins/fullscreen/plugin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.10/plugins/codesample/plugin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.10/plugins/bbcode/plugin.js"></script>


    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'paste fullscreen codesample code image',
            paste_data_images: true,
            images_upload_url: 'http://localhost:8000',
            images_upload_base_path: 'http://localhost:8000/assets',
            location : 'http://localhost:8000/assets/test.jpg',
            menubar: true,
            content_style: ".mce-content-body  {font-size: 14px;}",
            toolbar: 'undo redo bold italic alignleft aligncenter alignright codesample fullscreen code image'
       })
        tinymce.init({
            selector: '#image',
            plugins: 'paste codesample code image',
            paste_data_images: true,
            menubar: false,
            toolbar: 'codesample code image'
        })
    </script> 

    <div class="ui three item stackable tabs menu">
        <a href="/admin/articles" class="item">Articles</a>
        <a href="/admin/articles/create" class="item">Créer nouveau</a>
        <a href="/admin/articles" class="item">Voir tout</a>
    </div>

    <div id="id"></div>
    <form class="ui form" action="/admin/articles/{{ $article->id }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="field">
            <label>Titre</label>
            <input type="text" name="title" value="{{ $article->title }}">
        </div>
        <div class="field">
            <input type="file" name="image" id="file" placeholder="glisser déposer une image">
        </div>
        <div class="field">
            <label>Tags</label>
            <input type="text" name="tags">
        </div>
        <div class="field">
            <label>Apercu</label>
            <textarea name="overview" rows="4" cols="40" id="id">{{ $article->overview }}</textarea>
        </div>
        <div class="field">
            <label>Contenu</label>
            <textarea name="content" rows="15" cols="">{{ $article->content }}</textarea>
        </div>
        <div class="field">
            <button type="submit" class="ui button">GO</button>
        </div>
    </form>
@endsection