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
            <a href="#"><img src="images/facebook_icon.png" alt="" /></a>
            <a href="#"><img src="images/Instagram-Icon.png" alt="" /></a>
            <a href="#"><img src="images/Twitter_icon.png" alt="" /></a>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 d-flex justify-content-end">
          <div class="phone">
            telephone : +212 666 666 666
          </div>
        </div>
      </div>
    </header>
    <header class="sticky-top bg-light border-bottom">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand logo-brand" href="index.php"
            ><img src="images/logo-cps.png" alt=""
          /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse pages"
            id="navbarSupportedContent"
          >
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
                <a class="nav-link" href="fournisseurs.php">fournisseurs</a>
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
            <button
              href=""
              style="display: none;"
              class="btn btn-secondary"
              type="button"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Déconnexion
            </button>
            <!-- //  -->

            <!-- if session open hide  -->
            <div class="dropdown">
              <button
                class="btn btn-secondary dropdown-toggle"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Connexion
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="Connexion_part.php"
                  >passer une commande</a
                >
                <a class="dropdown-item" href="connexion_pro.php"
                  >publier une annonce</a
                >

                <a class="dropdown-item" href="commande.php">Mes commandes</a>
                <a class="dropdown-item" href="panier.php"
                  >Panier<span style="margin-left: 10px; text-align: right;"
                    ><i class="fa fa-shopping-cart"></i></span
                  ><span
                    style="
                      border-radius: 50%;
                      background-color: #009a8f;
                      color: #fff;
                      margin-left: 15px;
                      padding: 2px;
                    "
                    >+1</span
                  ></a
                >
                <a class="dropdown-item" href="favoris.php"
                  >Favoris<span style="margin-left: 10px;"
                    ><i class="fa fa-heart"></i></span
                ></a>
              </div>
            </div>
            <!-- //  -->
            <!-- if session open show  -->
            <div class="dropdown" style="display: none;">
              <button
                class="btn btn-secondary dropdown-toggle"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                {Nom d'utilisateur}
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="panier.php"
                  >Panier<span style="margin-left: 10px; text-align: right;"
                    ><i class="fa fa-shopping-cart"></i></span
                  ><span
                    style="
                      border-radius: 50%;
                      background-color: #009a8f;
                      color: #fff;
                      margin-left: 15px;
                      padding: 2px;
                    "
                    >+1</span
                  ></a
                >
                <a class="dropdown-item" href="favoris.php"
                  >Favoris<span style="margin-left: 10px;"
                    ><i class="fa fa-heart"></i></span
                ></a>
              </div>
            </div>
            <!-- //  -->
          </div>
        </div>
      </nav>
    </header>
  </body>
</html>
