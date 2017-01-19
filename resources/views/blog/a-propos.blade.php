@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h1>A propos du taulier de ces lieux...</h1>
            <p>
                Bonjour ami lecteur, recruteur, <strike>bot</strike>,<br><br>
                Sur ce site vous trouverez plein d'astuces dans le domaine du développement web. <br>
                Le panel de sujet est large: du JavaScript coté navigateur et serveur, du PHP, de la configuration Nginx, des modules Nodejs sympas, des tutoriels sur Go et plein d'autres.
                Oui j'insiste bien sur <em>autres...</em>. <br>
            </p>
            <p>
                La nouvelle version de ce blog est moins technique, plus axée sur les problèmes de sécurité. <br>
                L'idée est de faire un maximum de tutoriels sur des outils permettant de contourner la censure et la surveillance. <br>
                Des analyses techniques et politiques sont également prévues sur la mise en place des lois liberticides sur internet, on y reviendra ne vous inquiétez pas...
            </p>
            <p>
                Pour me présenter dans les grandes lignes, disons que je suis un acco de code et de nouvelles technologies en quête permanente de nouvelles choses à apprendre et à partager. <br>
                Je vis dans les Haut-de-Seine dans une charmante commune près de la Défense et travaille comme consultant pour différentes entreprises en France et au Royaume-Uni depuis début 2015.
            </p>
            <h2>Ma publicité</h2>
            <h3>Et oui c'est mon blog il y a pas de raison :)</h3>
            <p>
                Développeur indépendant, j'ai aussi quelques services à vous proposer : 
                <ul>
                    <li>développement de site internet</li>
                    <li>assistance à la configuration et au déploiement de votre application</li>
                    <li>création de bannière publicitaire animée</li>
                    <li>Achat de nom de domaine</li>
                    <li>Formation sur les bases du HTML et CSS</li>
                </ul>
                <a href="/contact">Contactez moi</a>
            </p>
        </div>
    </div>

    <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-default text-center service">
                            <div class="panel-body">
                                <h4><i class="fa fa-code"></i><br>Application web</h4>
                                <p>
                                    Développement de site internet, site vitrine ou CMS personnalisé.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-default text-center service">
                            <div class="panel-body">
                                <h4><i class="fa fa-mobile"></i><br>Site Responsive</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis distinctio perspiciatis, nesciunt similique neque cum culpa, inventore, tenetur odio animi enim ex quam consequuntur eius, vero maxime modi facilis. Dolores!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-default text-center service">
                            <div class="panel-body">
                                <h4><i class="fa fa-newspaper-o"></i><br>Newsletters</h4>
                                <p>
                                    Les mails permettent de fidéliser vos internautes, je vous propose la création de templates adaptés à votre charte graphique.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-default text-center service">
                            <div class="panel-body">
                                <h4><i class="fa fa-mortar-board"></i><br>Formation</h4>
                                <p>
                                    Bases des languages HTML & CSS
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
@endsection