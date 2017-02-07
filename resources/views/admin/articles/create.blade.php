@extends('layouts.admin')
@section('content')

    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">

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
                    <h4>Créér un nouvel article</h4>
                    <form action="/admin/articles" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="input-field">
                            <label for="title">Titre</label>
                            <input type="text" name="title" title="Titre">
                        </div>
                        <div class="input-field">
                            <input type="file" name="image" id="file" placeholder="glisser déposer une image">
                        </div>
                        <div class="input-field">
                            <label>Tags</label>
                            <input type="text" name="tags" title="tags">
                        </div>
                        {{--
                        <div class="input-field">
                            <label>Apercu</label>
                            <textarea name="overview" rows="4" cols="40" id="id" title="overview"></textarea>
                        </div>
                        --}}
                        <div class="input-field">
                            <textarea name="content" id="editor"></textarea>
                        </div>
                        {{--
                        <div class="input-field">
                            <label>Contenu</label>
                            <textarea name="content" rows="15" title="content"></textarea>
                        </div>
                        --}}
                        <div class="input-field">
                            <button type="submit" class="btn">GO</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <script>
        var simplemde = new SimpleMDE({
            element: document.getElementById('editor'),
            placeholder: 'Content here',
        });
    </script>
@endsection