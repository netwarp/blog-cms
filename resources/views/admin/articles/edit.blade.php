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
            plugins: 'paste fullscreen codesample code image media',
            paste_data_images: true,
            images_upload_url: 'http://localhost:8000',
            images_upload_base_path: 'http://localhost:8000/assets',
            location : 'http://localhost:8000/assets/test.jpg',
            menubar: true,
            content_style: ".mce-content-body  {font-size: 14px;}",
            toolbar: 'undo redo bold italic alignleft aligncenter alignright codesample fullscreen code image media'
       })
        tinymce.init({
            selector: '#image',
            plugins: 'paste codesample code image',
            paste_data_images: true,
            menubar: false,
            toolbar: 'codesample code image'
        })
    </script> 

    <div class="col s12">
        <nav class="blue-grey darken-2">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="#!" class="breadcrumb">Admin</a>
                    <a href="#!" class="breadcrumb">Articles</a>
                    <a href="#!" class="breadcrumb">Edit</a>
                </div>
            </div>
        </nav>
    </div>

    @if (count($errors) > 0)
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4>Editer l'article</h4>
                    <form class="ui form" action="/admin/articles/{{ $article->id }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="input-field">
                            <label for="title">Titre</label>
                            <input type="text" name="title" title="Titre" value="{{ $article->title }}">
                        </div>
                        <div class="input-field">
                            <input type="file" name="image" id="file" placeholder="glisser déposer une image">
                        </div>
                        @php
                            $tags = '';
                            foreach ($article->tags as $tag) {
                                $tags .= $tag->name . ' ';
                            }
                        @endphp
                        <div class="input-field">
                            <label>Tags</label>
                            <input type="text" name="tags" title="tags" value="{{ $tags }}">
                        </div>
                        <div class="input-field">
                            <label>Apercu</label>
                            <textarea name="overview" rows="4" cols="40" id="id" title="overview">{{ $article->overview }}</textarea>
                        </div>
                        <div class="input-field">
                            <label>Contenu</label>
                            <textarea name="content" rows="15" title="content">{{ $article->content }}</textarea>
                        </div>
                        <div class="input-field">
                            <button type="submit" class="btn">GO</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection