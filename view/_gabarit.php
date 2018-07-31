
<!<DOCTYPE html>
    <html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Billet Simple pour l'Alaska</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled.min.css?ver=4.4.0" rel="stylesheet">
        <link href="<?=ASSETS;?>css/style.css" rel="stylesheet">
        <link href="<?=ASSETS;?>css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

        <link href="<?=ASSETS;?>css/waypoints.css" rel="stylesheet">

        <!-- Material Design Bootstrap -->
        <link href="<?=ASSETS;?>css/mdb.min.css" rel="stylesheet">


    </head>

    <body>
    <!------------------------------NAVBAR----------------------------------------------------------------->

    <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">

        <a class="navbar-brand" href="#">Jean Forteroche</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarSupportedContent-3" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link waves-effect waves-light" href="<?=HOST;?>home">Accueil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="<?=HOST;?>about">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="<?=HOST;?>posts">Le roman</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link waves-effect waves-light" href="<?=HOST;?>contact">Contact</a>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </li>

                <li class="nav-item dropdown">

                    <?php

                    if(isset($_SESSION['role'])) {

                        if($_SESSION['role'] === 'admin'){ ?>

                            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                                <i class="fa fa-user"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right dropdown-default"
                                 aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item waves-effect waves-light" href="<?= HOST; ?>Dashboard">Tableau de bord</a>
                                <a class="dropdown-item waves-effect waves-light" href="<?= HOST; ?>logOut">Deconnexion</a>

                            </div>

                        <?php } elseif($_SESSION['role'] === 'user'){

                        ?>
                            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                                <i class="fa fa-user"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right dropdown-default"
                                 aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item waves-effect waves-light" href="<?= HOST; ?>profil">Profil</a>
                                <a class="dropdown-item waves-effect waves-light" href="<?= HOST; ?>logOut">Deconnexion</a>

                            </div>
                    <?php
                            }}else{
                    ?>
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                        <i class="fas fa-user-alt-slash"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item waves-effect waves-light" href="<?=HOST;?>login">Connexion</a>
                        <a class="dropdown-item waves-effect waves-light" href="<?=HOST;?>register">Inscription</a>
                    </div>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </nav>


<!--------Ma page ----------->

<?php echo $contentPage;?>


    <!-- Footer -->
    <footer class="page-footer font-small blue-grey lighten-5 mt-4">

        <div style="background-color: #26b2a4;">
            <div class="container">

                <!-- Grid row-->
                <div class="row py-4 d-flex align-items-center">

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                        <h6 class="mb-0">"Le vouloir rend possible l'impossible"</h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-7 text-center text-md-right">


                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row-->

            </div>
        </div>

        <!-- Footer Links -->
        <div class="container text-center text-md-left mt-5">

            <!-- Grid row -->
            <div class="row mt-3 dark-grey-text">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

                    <!-- Content -->
                    <h6 class="text-uppercase font-weight-bold">Jean Forteroche</h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p> L'auteur nous fait découvrir son nouveau roman au travers d'une nouvelle approche par le biais de publication hebdomadaire en ligne. </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Menu</h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a class="dark-grey-text" href="#!">a propos</a>
                    </p>
                    <p>
                        <a class="dark-grey-text" href="#!">Lectures</a>
                    </p>
                    <p>
                        <a class="dark-grey-text" href="#!">Contact</a>
                    </p>
                    <p>
                        <a class="dark-grey-text" href="#!">Accueil</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Administration</h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a class="dark-grey-text" href="<?=HOST;?>adminCo">Se connecter</a>
                    </p>



                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <i class="fa fa-home mr-3"></i>Rochefort en terre, Bretagne, France</p>
                    <p>
                        <i class="fa fa-envelope mr-3"></i> info@example.com</p>
                    <p>
                        <i class="fa fa-phone mr-3"></i> + 02 234 567 88</p>
                    <p>
                        <i class="fa fa-print mr-3"></i> + 02 234 567 89</p>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center text-black-50 py-3">© 2018 Copyright:
            <a class="dark-grey-text" href="https://mdbootstrap.com/bootstrap-tutorial/"> jean-forteroche.com</a>
        </div>
        <!-- Copyright -->

    </footer>


    <!-- Footer -->
    <!-- Optional JavaScript -->
    <script src="<?=ASSETS;?>js/app.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!--------------------Icones--------------------->
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </body>
    </html>