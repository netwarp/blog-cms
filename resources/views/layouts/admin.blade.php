<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/components/icon.css">
        <title>Admin</title>
        <style>
            #sidebar {
                border-radius: 0;
                margin-top: -1em;
            }
            .ui.vertical.menu .item > i.icon {
                float: left;
                margin-right: 10px;
            }
        </style>
    </head>
    <body class="pushable">
        <div class="ui equal width padded grid pusher stackable">
            <div class="row" >
                <div class="ui vertical inverted pointing menu" id="sidebar">
                    <a href="/admin" class="item {{ Route::currentRouteName() == 'admin.index' ? 'active': '' }}"><i class="dashboard icon"></i> Accueil</a>
                    <a href="/admin/articles" class="item {{ str_contains(Route::currentRouteName(), 'articles') ? 'active' : '' }}"><i class="file icon"></i> Articles</a>
                    <a href="/admin/messages" class="item {{ str_contains(Route::currentRouteName(), 'messages') ? 'active' : '' }}"><i class="comment outline icon"></i> Messages</a>
                    <a href="/admin/comments" class="item {{ str_contains(Route::currentRouteName(), 'comments') ? 'active' : '' }}"><i class="comments outline icon"></i> Commentaires</a>
                    <a href="/admin/banners" class="item"><i class="ticket icon"></i> Bannières</a>
                    <a href="/admin/setting" class="item"><i class="settings icon"></i>Paramètres</a>
                    <a href="/admin/backups" class="item {{ str_contains(Route::currentRouteName(), 'backups') ? 'active' : '' }}"><i class="history icon"></i>Backup</a>
                </div>
                <div class="thirteen wide column">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>