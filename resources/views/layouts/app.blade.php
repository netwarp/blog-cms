<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>blogstuff.io - blog d'un codeur</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style>
    #footer {
            background-color: #222;
            border-color: #090909;
            color: #f5f8fa;
            padding: 3rem 0;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse">
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        test
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/projets">Projets</a></li>
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
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </div>
                    <div class="well">
                        <h4>Categories</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                @php
                                    $categories = ['Tor', 'VPN', 'Cryptographie', 'Sécurité']
                                @endphp
                                <ul class="list-unstyled">
                                    
                                    @foreach($categories as $category)
                                        <li><a href="#">{{ $category }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                @php
                                    $categories = ['Politique', 'Censure', 'Surveillance', 'Autre']
                                @endphp
                                <ul class="list-unstyled">
                                    @foreach($categories as $category)
                                        <li><a href="#">{{ $category }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="well">
                        <h4>Side Widget Well</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                    </div>
                    <div class="well">
                        <h4>Abonnez vous à la newsletter <br> <small>on spam pas promis</small></h4>
                        <form action="/newsletter" method="POST">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Envoie</button>
                                </span>
                            </div>
                        </form>
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
