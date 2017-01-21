@extends('layouts.admin')

@section('content')
    <div class="col s12">
        <nav class="blue-grey darken-2">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="/admin" class="breadcrumb">Admin</a>
                    <a href="/admin/backups" class="breadcrumb">Sauvegardes</a>
                </div>
            </div>
        </nav>
    </div>
    @if(session('success'))
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>
    @elseif(count($errors) > 0)
        <div class="row">
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
       </div>
    @endif
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4>Sauvegardes</h4>
                    <p>
                        Les sauvegardes sont à faire régulièrement en cas de crash du serveur. <br>
                        Le bouton de gauche permet de télécharger un fichier compréssé au format zip qu'il faudra garder quelque part. <br>
                        Le bouton de droite permet d'importer une sauvegarde et executera un script de réstoration de la base de donnée et des images.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s6">
            <div class="card">
                <div class="card-content">
                    <a href="{{ route('admin.backups.make') }}" class="btn"><i class="download icon"></i>Faire une sauvegarde</a>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="card">
                <div class="card-content">
                    <form action="{{ route('admin.backups.upload') }}" id="upload" class="item" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for="file" class="">
                            <i class="upload icon"></i>
                            Importer une sauvegarde
                        </label>
                        <input type="file" id="file" name="file" style="display:none">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <table class="stripped bordered">
                        <thead>
                            <tr>
                                <th>Télecharger <small>année-mois-jour-heure-minute-seconde</small></th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($backups as $backup)
                                <tr>
                                    @php
                                        $file = explode('/', $backup);
                                        $file = end($file);
                                    @endphp
                                    <td><a href="{{ route('admin.backups.download', $file) }}">{{ $file }}</a></td>
                                    <td>
                                        <a href="{{ route('admin.backups.delete', $file) }}" class="btn red">&#10005;</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{--
    <div class="ui two item stackable tabs menu">
        <a href="{{ route('admin.backups.make') }}" class="item"><i class="download icon"></i>Faire une sauvegarde</a>

        <form action="{{ route('admin.backups.upload') }}" id="upload" class="item" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="file" class="">
                <i class="upload icon"></i>
                Importer une sauvegarde
            </label>
            <input type="file" id="file" name="file" style="display:none">
        </form>
    </div>

    @if(session('success'))
        <div class="ui positive message">
            {{ session('success') }}
        </div>
    @elseif(count($errors) > 0)
        <div class="ui negative message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table class="ui celled table">
        <thead>
            <tr>
                <th>Télecharger <small>année-mois-jour-heure-minute-seconde</small></th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($backups as $backup)
                <tr>
                    @php
                        $file = explode('/', $backup);
                        $file = end($file);
                    @endphp
                    <td><a href="{{ route('admin.backups.download', $file) }}">{{ $file }}</a></td>
                    <td>
                        <a href="{{ route('admin.backups.delete', $file) }}" class="ui button mini red">&#10005;</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        var upload = document.getElementById('upload');
        var file = document.getElementById('file');
        file.addEventListener('change', function() {
            upload.submit();
        });
    </script>
    --}}
@endsection