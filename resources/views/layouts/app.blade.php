<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>medialogs.fr - blog d'un codeur</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse" style="min-height: 70px">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="/">
                        <img src="/img/medialogs.jpg" alt="logo" width="280">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/projets">Projets</a></li>
                        <li><a href="/soutien">Soutien</a></li>
                        <li><a href="/a-propos">A propos</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @yield('content')
                </div>
                <div class="col-md-4">
                    <div class="well">
                        <h4>Recherche</h4>
                        <form action="/recherche" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" name="word">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <span class="glyphicon glyphicon-search"></span>
                                </button>
                                </span>
                            </div>
                        </form>

                    </div>
                    <div class="well">
                        <h4>Categories</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                @php
                                    $categories = ['Tor', 'VPN', 'Sécurité', 'Communication']
                                @endphp
                                <ul class="list-unstyled">
                                    
                                    @foreach($categories as $category)
                                        <li><a href="/tag/{{ strtolower($category) }}">{{ $category }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                @php
                                    $categories = ['Politique', 'Censure', 'Surveillance', 'Autre']
                                @endphp
                                <ul class="list-unstyled">
                                    @foreach($categories as $category)
                                        <li><a href="/tag/{{ strtolower($category) }}">{{ $category }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="well">
                        <h4>On est ou là ?</h4>
                        <p>Sur ce blog ça cause de code, de politique parfois, et d'outils dédiés à la sécurité et au contournement de la censure.<br> Plus d'infos sur <a href="/a-propos">cette page</a></p>
                    </div>
                    <div class="well">
                        <h4>Abonnez vous à la newsletter <br> <small>on spam pas promis</small></h4>
                        <form action="/newsletters" method="POST">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Envoie</button>
                                </span>
                            </div>
                        </form>
                    </div>

                    <div class="well">
                        <h4>Articles au hasard</h4>
                        @php
                            $articles = DB::table('articles')->inRandomOrder()->limit(5)->get();
                        @endphp
                        
                        <ul class="list-unstyled">
                            @foreach($articles as $article)
                                <li><a href="/article/{{ $article->id }}/{{ $article->slug }}">{{ $article->title }}</a></li>
                            @endforeach
                        </ul>                
                    </div>
                </div>
            </div>
        </div>
        
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {{ date('Y') }} - Le contenu du blog est en licence WTFPL
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
