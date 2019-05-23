<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Polymaris - Souchothèque</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/souche.css')}}"/>
    <link rel="icon" href="{{asset('ressources/favicon.ico')}}">
    @yield("customCss")
</head>

@auth

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <a class="navbar-brand font-italic pr-2 border-right" href="/home">
            <img src="{{asset('ressources/image/logo.jpg')}}" width="40" height="40" >
            Souchotèque
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/home">Liste des souches <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Souches
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/souche/ajout">Ajouter</a>
                        @if($user->utilisateur == 3)
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/historique/">Dernière mise à jour</a>
                        @endif
                    </div>
                </li>
                @if($user->utilisateur >= 1)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestion utilisateurs
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if($user->utilisateur >= 2)
                        <a class="dropdown-item" href="/user/ajout">Ajouter un utilisateur</a>
                        @endif
                        @if($user->utilisateur == 3)
                        <a class="dropdown-item" href="/user/accreditation">Gérer les accréditation</a>
                        <div class="dropdown-divider"></div>
                        @endif
                        <a class="dropdown-item" href="/user/liste">Liste des utilisateurs</a>
                    </div>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="/user/profil/{{$user->id}}">Mon profil<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/logout">Déconnexion<span class="sr-only"></span></a>
                </li>
            </ul>
            <span class="navbar-text font-weight-light font-italic h4 pl-2 border-left">Polymaris Biotechnology</span>
        </div>
    </nav>

    @yield('body')

@endauth

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


    @yield('customJs')

    <footer class="page-footer font-small indigo">

        <!-- Footer Links -->
        <div class="container">

            <!-- Grid row-->
            <div class="row text-center d-flex justify-content-center pt-5 mb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="/home">Liste des souches</a>
                    </h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                @if($user->utilisateur != 0)
                <div class="col-md-3 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="/user/liste">Gestion des comptes</a>
                    </h6>
                </div>
                @endif
                <!-- Grid column -->

                <!-- Grid column -->
                @if($user->utilisateur != 0)
                <div class="col-md-3 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="/historique">Historique</a>
                    </h6>
                </div>
                @endif
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="#!">FAQ</a>
                    </h6>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row-->
            <hr class="rgba-white-light" style="margin: 0 15%;">

            <!-- Grid row-->
            <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">



            </div>
            <!-- Grid row-->
            <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">


            <!-- Grid column -->

        </div>
        <!-- Grid row-->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2019 Copyright:
            <a href="#!"> Arthur Sicard / Denis Crenn</a>
        </div>
        <!-- Copyright -->

    </footer>
</body>


</html>