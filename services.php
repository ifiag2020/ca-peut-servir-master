<?php
session_start();

if (!isset($_SESSION["session_login"]) && !empty($_SESSION["session_login"])) {	
    echo "<script type='text/javascript'>window.location = 'index.php';</script>";
 } 
    spl_autoload_register(function($class){
	include("models/".strtolower($class).".class.php");
 });
 
 if ( !empty($_SESSION["session_login"])) {
	
	$nom=$_SESSION["session_login"];
		Idao::connect();
		$all = Idao::findid($nom,$nom);
		if($all){
		$id= $all->id_user;
		}
	$profile = Idao::findidProfil($nom,$nom);	
		if($profile){
		$id_profile= $profile->id_profile;	
		}
 } 
 ?>
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
				<?php if(!empty($_SESSION["session_login"])){ echo "Bonjour : ".($_SESSION["session_login"]).''; } ?>	
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
			<?php if (!empty($_SESSION["session_login"])) { ?>
		<!-- if session open hide  -->
            <div class="dropdown">
              <button
                class="btn form-control dropdown-toggle"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
               <?php echo (strtoupper($_SESSION["session_login"])) ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			  		<?php if($id_profile=="2"){ echo '<a class="dropdown-item" href="profile.php?id='.$id.'">Modifier Profile</a>'?>	
					<?php }else if($id_profile=="3"){ echo '<a class="dropdown-item" href="profile_pro.php?id='.$id.'">Modifier Profile</a>'?>
					<?php } ?>
					<a class="dropdown-item" href="commande.php">Mes commandes</a>
					<a class="dropdown-item" href="panier.php"
					>Panier<span style="margin-left: 10px; text-align: right"
                    ><i class="fa fa-shopping-cart"></i></span
					><span
                    style="
                      border-radius: 50%;
                      background-color: #009a8f;
                      color: #fff;
                      margin-left: 15px;
                      padding: 2px;
                    ">+1</span></a>
					<a class="dropdown-item" href="favoris.php"
					  >Favoris<span style="margin-left: 10px"
						><i class="fa fa-heart"></i></span>
					</a>
					<a class="dropdown-item" href="logout.php">Déconnexion</a> 
				</div>
			</div>     
				<div style="margin-left: 20px; margin-right: 20px; ">			
					<div class="carousel-info">
						<button  class="btn form-controlbtn btn-secondary" onclick="window.location.href='depot.php'">Déposer une annonce</button>
					</div>
				</div>

				<!-- //  -->
	<?php }else { ?>

                        <!-- if session open hide  -->
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Connexion
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="Connexion_part.php">passer une commande</a>
                            <a class="dropdown-item" href="connexion_pro.php">publier une annonce</a>
                            <a class="dropdown-item" href="commande.php">Mes commandes</a>
                            <a class="dropdown-item" href="panier.php">Panier<span style="margin-left: 10px; text-align: right;"><i class="fa fa-shopping-cart"></i></span><span style="border-radius: 50%; background-color: #009a8f; color: #fff; margin-left: 15px; padding: 2px;">+1</span></a>
                            <a class="dropdown-item" href="favoris.php">Favoris<span style="margin-left: 10px"><i class="fa fa-heart"></i></span></a>
                            </div>
                        </div>
                        <!-- //  -->
                        <!-- if session open show  -->
                        <div class="dropdown" style="display: none;">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {Nom d'utilisateur}
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="panier.php">Panier<span style="margin-left: 10px; text-align: right;"><i class="fa fa-shopping-cart"></i></span><span style="border-radius: 50%; background-color: #009a8f; color: #fff; margin-left: 15px; padding: 2px;">+1</span></a>
                          <a class="dropdown-item" href="favoris.php">Favoris<span style="margin-left: 10px"><i class="fa fa-heart"></i></span></a>
                          </div>
                      </div>
                      <!-- //  -->	
	
	<?php } ?>
          </div>
        </div>
      </nav>
    </header>

    <!-- Banner -->
    <section id="banner">
      <div class="principal-banner">
        <h1>Nos services</h1>
        <img src="images/banner.jpg" alt="" />
      </div>
    </section>

    <div class="container" id="lien-page">
      <p>
        <a href="index.php" class="text-decoration-none text-secondary"
          >Accueil</a
        >
        > Services
      </p>
    </div>

    <!-- Service Start  -->
    <section id="service">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Lorem ipsum dolor sit</h1>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat
              unde architecto blanditiis. Totam quam expedita, laudantium,
              aspernatur voluptate necessitatibus ullam quo possimus doloremque
              animi quae suscipit, quos sequi ea sunt.
            </p>
          </div>
        </div>
      </div>
      <div class="services-icons">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-12">
              <span><i class="fa fa-truck"></i></span>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet,
                temporibus necessitatibus ab delectus.
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
              <span><i class="fa fa-shopping-cart"></i></span>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet,
                temporibus necessitatibus ab delectus.
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
              <span><i class="fa fa-dollar"></i></span>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet,
                temporibus necessitatibus ab delectus.
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
              <span><i class="fa fa-hourglass-start"></i></span>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet,
                temporibus necessitatibus ab delectus.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="title-service">
      <div class="container mb-5">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8 text-center mb-5 mt-5">
            <h1>Lorem ipsum dolor</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="thumb">
              <img
                class="img-fluid"
                src="images/photo-1532634896-26909d0d4b89.jpg"
                alt=""
              />
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="thumb">
              <img
                class="img-fluid"
                src="images/photo-1532634896-26909d0d4b89.jpg"
                alt=""
              />
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="thumb">
              <img
                class="img-fluid"
                src="images/photo-1532634896-26909d0d4b89.jpg"
                alt=""
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="thumb">
              <img
                class="img-fluid"
                src="images/photo-1532634896-26909d0d4b89.jpg"
                alt=""
              />
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="thumb">
              <img
                class="img-fluid"
                src="images/photo-1532634896-26909d0d4b89.jpg"
                alt=""
              />
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="thumb">
              <img
                class="img-fluid"
                src="images/photo-1532634896-26909d0d4b89.jpg"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer Start -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="info-footer">
              <a href="index.php"><img src="images/logo-cps.png" alt="" /></a>
              <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe
                quisquam tenetur veniam nesciunt error sequi aliquam accusamus
                sit suscipit itaque distinctio, quasi soluta vero alias
                reprehenderit illum impedit provident beatae?
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
                <li><a href="fournisseurs.php">fournisseurs</a>
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
              <a href="#"><img src="images/facebook_icon.png" alt="" /></a>
              <a href="#"><img src="images/Instagram-Icon.png" alt="" /></a>
              <a href="#"><img src="images/Twitter_icon.png" alt="" /></a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/script.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
