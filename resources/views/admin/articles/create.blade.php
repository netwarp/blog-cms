@extends('layouts.admin')
@section('content')

    <script src="/js/jquery.min.js"></script>
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
            images_upload_url: '/api/upload',
            images_upload_base_path: '/api/upload',
            location : '/api/upload',
            menubar: true,
            content_style: ".mce-content-body  {font-size: 14px;}",
            toolbar: 'undo redo bold italic alignleft aligncenter alignright codesample fullscreen code image'
        })
    </script> 

    <div class="ui three item stackable tabs menu">
        <a href="/admin/articles" class="item">Articles</a>
        <a href="/admin/articles/create" class="item">Créer nouveau</a>
        <a href="/admin/articles" class="item">Voir tout</a>
    </div>

    @if (count($errors) > 0)
        <div class="ui message negative ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form class="ui form" action="/admin/articles" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="field">
            <label for="title">Titre</label>
            <input type="text" name="title" title="Titre">
        </div>
        <div class="field">
            <input type="file" name="image" id="file" placeholder="glisser déposer une image">
        </div>
        <div class="field">
            <label>Tags</label>
            <input type="text" name="tags" title="tags">
        </div>
        <div class="field">
            <label>Apercu</label>
            <textarea name="overview" rows="4" cols="40" id="id" title="overview"></textarea>
        </div>
        <div class="field">
            <label>Contenu</label>
            <textarea name="content" rows="15" title="content"></textarea>
        </div>
        <div class="field">
            <button type="submit" class="ui button">GO</button>
        </div>
    </form>
@endsection