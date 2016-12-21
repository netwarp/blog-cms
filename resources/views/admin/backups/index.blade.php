@extends('layouts.admin')

@section('content')
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
    <h1>Sauvegardes</h1>
    <p>
        Les sauvegardes sont à faire régulièrement en cas de crash du serveur. <br>
        Le bouton de gauche permet de télécharger un fichier compréssé au format zip qu'il faudra garder quelque part. <br>
        Le bouton de droite permet d'importer une sauvegarde et executera un script de réstoration de la base de donnée et des images.
    </p>
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
@endsection