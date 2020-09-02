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
        <h1>Nos repas</h1>
        <img src="images/banner.jpg" alt="" />
      </div>
    </section>

    <div class="container" id="lien-page">
      <p>
        <a href="index.php" class="text-decoration-none text-secondary"
          >Accueil</a
        >
        > Repas
      </p>
    </div>

    <!-- filtre start  -->
    <div class="container">
      <div class="filter-background d-flex align-items-center">
        <div class="row">
          <div class="col-md-4">
            <h1>commandez votre repas dès maintenant !</h1>
          </div>

          <!-- Recherche avec php  -->
          <div class="col-md-5">
            <form role="search" method="get" class="search-form form" action="">
              <label>
                <input
                  type="search"
                  class="search-field"
                  placeholder="Rechercher..."
                  value=""
                  name="s"
                  title=""
                />
              </label>
              <input
                type="button"
                class="search-submit button"
                value="&#xf002"
              />
              <!-- <i class="fa fa-search"></i> -->
            </form>
          </div>
          <!-- //  -->


            <div class="categorie col-md-3 d-flex justify-content-center">
              <div class="dropdown deroulant">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Choisir la catégorie
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <button class="dropdown-item" type="button">Reastaurant</button>
                  <button class="dropdown-item" type="button">Boulangerie</button>
                  <button class="dropdown-item" type="button">Patisserie</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Repas Start  -->
    <section id="repas" class="text-center">
    <div class="container">
      <h1>Lorem ipsum</h1>
      <div class="row justify-content-between">
          <div class="col-md-3 col-sm-12 menu">
            <a href="repas-detail.php"><img src="images/menu/salade.png" alt=""></a>
            <h2>menu 1<a class="plus" href="repas-detail.php"><i class="fa fa-plus-square"></i></a>
            </h2>
            <h3>Ajouter aux favoris<button type="submit" class="btn btn-custom btn-sm liketoggle" name="like"><i class="fa fa-heart"></i></button>
            </h3>
          </div>

          <!-- Boucle  -->
          <div class="col-md-3 col-sm-12 menu">
            <a href="repas-detail.php"><img src="images/menu/salade.png" alt=""></a>
            <h2>menu 1<a class="plus" href="repas-detail.php"><i class="fa fa-plus-square"></i></a>
            </h2>
            <h3>Ajouter aux favoris<button type="submit" class="btn btn-custom btn-sm liketoggle" name="like"><i class="fa fa-heart"></i></button>
            </h3>
          </div>
          <!-- //  -->

          <div class="col-md-3 col-sm-12 menu">
            <a href="#"><img src="images/menu/cafe.png" alt=""></a>
            <h2>menu 3<a class="plus" href="repas-detail.php"><i class="fa fa-plus-square"></i></a></h2>
            <h3>Ajouter aux favoris<button type="submit" class="btn btn-custom btn-sm liketoggle" name="like"><i class="fa fa-heart"></i></button>
            </h3>
          </div>
          <div class="col-md-3 col-sm-12 menu">
            <a href="#"><img src="images/menu/pizza.png" alt=""></a>
            <h2>menu 4<a class="plus" href="repas-detail.php"><i class="fa fa-plus-square"></i></a></h2>
            <h3>Ajouter aux favoris<button type="submit" class="btn btn-custom btn-sm liketoggle" name="like"><i class="fa fa-heart"></i></button>
            </span>
            </h3>
          </div>
          <div class="col-md-3 col-sm-12 menu">
            <a href="#"><img src="images/menu/salade.png" alt=""></a>
            <h2>menu 1<a class="plus" href="repas-detail.php"><i class="fa fa-plus-square"></i></a></h2>
            <h3>Ajouter aux favoris<button type="submit" class="btn btn-custom btn-sm liketoggle" name="like"><i class="fa fa-heart"></i></button>
            </h3>
          </div>
          <div class="col-md-3 col-sm-12 menu">
            <a href="#"><img src="images/menu/salade2.png" alt=""></a>
            <h2>menu 2<a class="plus" href="repas-detail.php"><i class="fa fa-plus-square"></i></a></h2>
            <h3>Ajouter aux favoris<button type="submit" class="btn btn-custom btn-sm liketoggle" name="like"><i class="fa fa-heart"></i></button>
            </h3>
          </div>
          <div class="col-md-3 col-sm-12 menu">
            <a href="#"><img src="images/menu/cafe.png" alt=""></a>
            <h2>menu 3<a class="plus" href="repas-detail.php"><i class="fa fa-plus-square"></i></a></h2>
            <h3>Ajouter aux favoris<button type="submit" class="btn btn-custom btn-sm liketoggle" name="like"><i class="fa fa-heart"></i></button>
            </h3>
          </div>
          <div class="col-md-3 col-sm-12 menu">
            <a href="#"><img src="images/menu/pizza.png" alt=""></a>
            <h2>menu 4<a class="plus" href="repas-detail.php"><i class="fa fa-plus-square"></i></a></h2>
            <h3>Ajouter aux favoris<button type="submit" class="btn btn-custom btn-sm liketoggle" name="like"><i class="fa fa-heart"></i></button>
            </span>
            </h3>
          </div>
          <div class="col-md-3 col-sm-12 menu">
            <a href="#"><img src="images/menu/salade.png" alt=""></a>
            <h2>menu 1<a class="plus" href="repas-detail.php"><i class="fa fa-plus-square"></i></a></h2>
            <h3>Ajouter aux favoris<button type="submit" class="btn btn-custom btn-sm liketoggle" name="like"><i class="fa fa-heart"></i></button>
            </h3>
          </div>
          <div class="col-md-3 col-sm-12 menu">
            <a href="#"><img src="images/menu/salade2.png" alt=""></a>
            <h2>menu 2<a class="plus" href="repas-detail.php"><i class="fa fa-plus-square"></i></a></h2>
            <h3>Ajouter aux favoris<button type="submit" class="btn btn-custom btn-sm liketoggle" name="like"><i class="fa fa-heart"></i></button>
            </h3>
          </div>
          <div class="col-md-3 col-sm-12 menu">
            <a href="#"><img src="images/menu/cafe.png" alt=""></a>
            <h2>menu 3<a class="plus" href="repas-detail.php"><i class="fa fa-plus-square"></i></a></h2>
            <h3>Ajouter aux favoris<button type="submit" class="btn btn-custom btn-sm liketoggle" name="like"><i class="fa fa-heart"></i></button>
            </h3>
          </div>
          <div class="col-md-3 col-sm-12 menu">
            <a href="#"><img src="images/menu/pizza.png" alt=""></a>
            <h2>menu 4<a class="plus" href="repas-detail.php"><i class="fa fa-plus-square"></i></a></h2>
            <h3>Ajouter aux favoris<button type="submit" class="btn btn-custom btn-sm liketoggle" name="like"><i class="fa fa-heart"></i></button>
            </span>
            </h3>
          </div>
      </div>

      <!-- Pagination plus que  12 produits -->
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
        <!-- //  -->
    </div>
  </section>

    <!-- Repas Start 
    <section id="repas">
      <div class="container">
        <h1 class="text-center mt-5 mb-5">Lorem ipsum doloris</h1>
        <div class="row">
          <div class="col-md-3 shadow">
            <div class="thumb mb-2 mt-2">
              <img class="img-fluid" src="images/vegetable.png" alt="" />
            </div>
            <h4>Restaurant</h4>
            <div class="meta-bottom d-flex justify-content-between">
              <p><i class="fa fa-star-o" aria-hidden="true"></i> 4.6</p>
              <p>
                Ajouter aux favoris
                <i class="fa fa-heart-o" aria-hidden="true"></i>
              </p>
            </div>
          </div>

          <div class="col-md-3 shadow">
            <div class="thumb mb-2 mt-2">
              <img class="img-fluid" src="images/vegetable.png" alt="" />
            </div>
            <h4>Restaurant</h4>
            <div class="meta-bottom d-flex justify-content-between">
              <p><i class="fa fa-star-o" aria-hidden="true"></i> 4.6</p>
              <p>
                Ajouter aux favoris
                <i class="fa fa-heart-o" aria-hidden="true"></i>
              </p>
            </div>
          </div>

          <div class="col-md-3 shadow">
            <div class="thumb mb-2 mt-2">
              <img class="img-fluid" src="images/vegetable.png" alt="" />
            </div>
            <h4>Restaurant</h4>
            <div class="meta-bottom d-flex justify-content-between">
              <p><i class="fa fa-star-o" aria-hidden="true"></i> 4.6</p>
              <p>
                Ajouter aux favoris
                <i class="fa fa-heart-o" aria-hidden="true"></i>
              </p>
            </div>
          </div>

          <div class="col-md-3 shadow">
            <div class="thumb mb-2 mt-2">
              <img class="img-fluid" src="images/vegetable.png" alt="" />
            </div>
            <h4>Restaurant</h4>
            <div class="meta-bottom d-flex justify-content-between">
              <p><i class="fa fa-star-o" aria-hidden="true"></i> 4.6</p>
              <p>
                Ajouter aux favoris
                <i class="fa fa-heart-o" aria-hidden="true"></i>
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3 shadow">
            <div class="thumb mb-2 mt-2">
              <img class="img-fluid" src="images/vegetable.png" alt="" />
            </div>
            <h4>Boulangerie</h4>
            <div class="meta-bottom d-flex justify-content-between">
              <p><i class="fa fa-star-o" aria-hidden="true"></i> 4.6</p>
              <p>
                Ajouter aux favoris
                <i class="fa fa-heart-o" aria-hidden="true"></i>
              </p>
            </div>
          </div>

          <div class="col-md-3 shadow">
            <div class="thumb mb-2 mt-2">
              <img class="img-fluid" src="images/vegetable.png" alt="" />
            </div>
            <h4>Boulangerie</h4>
            <div class="meta-bottom d-flex justify-content-between">
              <p><i class="fa fa-star-o" aria-hidden="true"></i> 4.6</p>
              <p>
                Ajouter aux favoris
                <i class="fa fa-heart-o" aria-hidden="true"></i>
              </p>
            </div>
          </div>

          <div class="col-md-3 shadow">
            <div class="thumb mb-2 mt-2">
              <img class="img-fluid" src="images/vegetable.png" alt="" />
            </div>
            <h4>Boulangerie</h4>
            <div class="meta-bottom d-flex justify-content-between">
              <p><i class="fa fa-star-o" aria-hidden="true"></i> 4.6</p>
              <p>
                Ajouter aux favoris
                <i class="fa fa-heart-o" aria-hidden="true"></i>
              </p>
            </div>
          </div>

          <div class="col-md-3 shadow">
            <div class="thumb mb-2 mt-2">
              <img class="img-fluid" src="images/vegetable.png" alt="" />
            </div>
            <h4>Boulangerie</h4>
            <div class="meta-bottom d-flex justify-content-between">
              <p><i class="fa fa-star-o" aria-hidden="true"></i> 4.6</p>
              <p>
                Ajouter aux favoris
                <i class="fa fa-heart-o" aria-hidden="true"></i>
              </p>
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
      </div>
    </section> -->

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
