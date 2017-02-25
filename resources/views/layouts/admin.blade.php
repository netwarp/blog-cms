<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/materialize.css">
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
        <title>Admin</title>
    </head>
    <body class="black">
        <div class="container-fluid grey darken-4">
            <div class="row">
                <div class="col s3 grey darken-4 white-text">
                    <div class="collection">
                        <a href="/admin" class="collection-item {{ Route::currentRouteName() == 'admin.index' ? 'active': '' }}">Admin</a>
                        <a href="/admin/articles" class="collection-item {{ str_contains(Route::currentRouteName(), 'articles') ? 'active' : '' }}">Articles</a>
                        <a href="/admin/comments" class="collection-item {{ str_contains(Route::currentRouteName(), 'comments') ? 'active' : '' }}">Commentaires</a>
                        <a href="/admin/messages" class="collection-item {{ str_contains(Route::currentRouteName(), 'messages') ? 'active' : '' }}">Messages</a>
                        <a href="/admin/backups" class="collection-item" {{ str_contains(Route::currentRouteName(), 'backups') ? 'active' : '' }}>Sauvegardes</a>
                        <a href="#" class="collection-item">Paramètres</a>
                        <a href="/" class="collection-item">Site public</a>
                    </div>
                </div>
                <div class="col s9 blue-grey darken-4" style="min-height: 100vh;">
                    @yield('content')
                </div>
            </div>
        </div>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/materialize.js"></script>
    </body>
</html>