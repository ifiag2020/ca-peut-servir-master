<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
</head>
<body>
<!-- Header Start  -->
<header class="container border-bottom pb-2">
        <div class="row d-flex justify-content-between">
            <div class="col-md-4 col-sm-6">
                <div class="social">
                    <a href="#"><img src="images/facebook_icon.png" alt=""></a>
                    <a href="#"><img src="images/Instagram-Icon.png" alt=""></a>
                    <a href="#"><img src="images/Twitter_icon.png" alt=""></a>  
                </div>
            </div>
            <div class="col-md-4 col-sm-6 d-flex justify-content-end">
                <div class="phone">
                   telephone  : +212 666 666 666
                </div>
            </div>           
        </div>
    </header>
    <header class="sticky-top bg-light border-bottom">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand logo-brand" href="index.php"><img src="images/logo-cps.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse pages" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto mx-auto">
                            <li class="nav-item">
                            <a class="nav-link" href="index.php">Accueil</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="about.php">a propos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="services.php">services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">fournisseurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="repas.php">repas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">contact</a>
                            </li>                        
                        </ul>
                        <div class="line-effect"></div>

                        <!-- if session open show  -->
                        <button href="" style="display:none;" class="btn btn-secondary" type="button" aria-haspopup="true" aria-expanded="false">
                            Déconnexion
                        </button>
                        <!-- //  -->

                        <!-- if session open hide  -->
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Connexion
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="Connexion_part.php">passer une commande</a>
                            <a class="dropdown-item" href="connexion_pro.php">publier une annonce</a>
                            </div>
                        </div>
                        <!-- //  -->
                    </div>
            </div>
    </nav>
</header> 

    <div class="container" id="lien-page">
        <p><a href="index.php" class="text-decoration-none text-secondary">Accueil</a> > Favoris</p>
    </div>

    <!-- Favoris Start  -->
    <section id="favoris">
        <div class="container">
            <div class="card p-3">
                <div class="wrapper row">
                    <div class="col-md-6">
                        <div><img class="img-fluid" src="images/photo-1532634896-26909d0d4b89.jpg" /></div>
                    </div>
                    <div class="col-md-6 pt-3">
                    
                        <div class="row">
                            <div class="col-md-10 text-secondary"><h3>Etablissement</h3></div>
                            <div class="col-md-2"><i class="fa fa-heart fa-2x text-danger" aria-hidden="true"></i></div>
                        </div>
                        <p class="text-justify pr-4">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
                        <div class="position-titre">
                            <a href="#" class="offre position-offre">Voir les offres</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card p-3">
                <div class="wrapper row">
                    <div class="col-md-6">
                        <div><img class="img-fluid" src="images/photo-1532634896-26909d0d4b89.jpg" /></div>
                    </div>
                    <div class="col-md-6 pt-3">
                    
                        <div class="row">
                            <div class="col-md-10 text-secondary"><h3>Etablissement</h3></div>
                            <div class="col-md-2"><i class="fa fa-heart fa-2x text-danger" aria-hidden="true"></i></div>
                        </div>
                        <p class="text-justify pr-4">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
                        <div class="position-titre">
                            <a href="#" class="offre position-offre">Voir les offres</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-5">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
            </ul>
        </nav>
    </section>

    <!-- Footer Start -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="info-footer">
                    <a href="index.php"><img src="images/logo-cps.png" alt=""></a>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe quisquam tenetur 
                        veniam nesciunt error sequi aliquam accusamus sit suscipit itaque distinctio, quasi
                         soluta vero alias reprehenderit illum impedit provident beatae?
                    </p>
                    <ul>
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#">terms and conditions</a></li>
                    </ul>
                    <span>Copyright © 2020 DIGITALGRID</span>
                </div>
            </div>
            <div class="col-md-2 offset-md-1">
                <div class="footer-menu1">
                    <ul>
                        <li><a href="about.php">a propos</a></li>
                        <li><a href="services.php">services</a></li>
                        <li><a href="#">fournisseurs</a></li>
                        <li><a href="repas.php">repas</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 offset-md-1">
                <div class="footer-menu2">
                    <ul>
                        <li><a href="#">particulier</a></li>
                        <li><a href="#">professionel</a></li>
                        <li><a href="#">contact</a></li>
                        <li><a href="#">plan du site</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-social">
                    <span>follow us</span>      
                    <a href="#"><img src="images/facebook_icon.png" alt=""></a>
                    <a href="#"><img src="images/Instagram-Icon.png" alt=""></a>
                    <a href="#"><img src="images/Twitter_icon.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>