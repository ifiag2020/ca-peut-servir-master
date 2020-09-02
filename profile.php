<?php
session_start();
if (!isset($_SESSION["session_login"])) {
	
     echo "<script type='text/javascript'>window.location = 'index.php';</script>";
 } 
 
  spl_autoload_register(function($class){
	include("models/".strtolower($class).".class.php");
 });

Idao::connect();
$action = "store";
if (isset($_GET['id']) && !empty($_GET['id'])) {
   $action = "update";
   $u =  Idao::finduser($_GET['id']);
}

if(isset($_POST['form_user']) && !empty($_POST['form_user']) && $_POST['form_user'] == 'update_user'){
	$id_user =  $_POST['id_user'];
	$nom =  $_POST['nom'];
	$prenom =  $_POST['prenom'];
	$email =  $_POST['email'];
	$telephone =  $_POST['telephone'];
	$data_array = array(
		'nom' => $nom,
		'prenom' => $prenom,
		'email' => $email,
		'telephone' => $telephone
	);
	Idao::update($data_array, $id_user);
	Idao::redirect('profile.php?id='.$id_user.'&rep=1');
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
          <div class="phone">Bonjour : <?php echo ($_SESSION["session_login"]) ?>	</div>
        </div>   
		<div class="col-md-4 col-sm-6 d-flex justify-content-end">
          <div class="phone">telephone : +212 666 666 666</div>
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
			<?php if (isset($_SESSION["session_login"])) { ?>
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
                    "
                    >+1</span
                  ></a
                >
                <a class="dropdown-item" href="favoris.php"
                  >Favoris<span style="margin-left: 10px"
                    ><i class="fa fa-heart"></i></span
                ></a>
				<a class="dropdown-item" href="logout.php">Déconnexion</a> 
              </div>
            </div>     
			<div style="margin-left: 20px; margin-right: 20px; ">			
				<div class="carousel-info">
					<button  class="btn form-controlbtn btn-secondary" onclick="window.location.href='depot.php'">Déposer une annonce</button>
				</div>
			</div>

            <!-- //  -->
<?php } ?>
            <!-- //  -->
            <!-- if session open show  -->
            <div class="dropdown" style="display: none">
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
                  >Panier<span style="margin-left: 10px; text-align: right"
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
                  >Favoris<span style="margin-left: 10px"
                    ><i class="fa fa-heart"></i></span
                ></a>
              </div>
            </div>
            <!-- //  -->
          </div>
        </div>
      </nav>
    </header>

    <!-- Tabs -->
    <section id="tabs" class="project-tab">
      <div class="container">
		<?php if (isset($_GET['rep']) && !empty($_GET['rep'])) { ?>
        <div class="row">
          <div class="col-md-12">
			<?php if ($_GET['rep'] == "1") { ?>
			<div class="box bl-green box-alert">
				La mise à jour du profil à été effectuée avec succès.
			</div>
			<?php }else{ ?>
			<div class="box bl-red box-alert">
				Une erreur s'est produite lors de la mise à jour du profil.
			</div>
			<?php } ?>
		  </div>
		 </div>
		<?php } ?>
			
		 
        <div class="row">
          <div class="col-md-12">
		  
            <nav>
              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a
                  class="nav-item nav-link"
                  id="nav-annonce-tab"
                  data-toggle="tab"
                  href="#nav-annonce"
                  role="tab"
                  aria-controls="nav-annonce"
                  aria-selected="false"
                  >Mes annonces</a>
                <a
                  class="nav-item nav-link"
                  id="nav-favoris-tab"
                  data-toggle="tab"
                  href="#nav-favoris"
                  role="tab"
                  aria-controls="nav-favoris"
                  aria-selected="false"
                  >Mes favoris</a>
                <a
                  class="nav-item nav-link active"
                  id="nav-reglage-tab"
                  data-toggle="tab"
                  href="#nav-reglage"
                  role="tab"
                  aria-controls="nav-reglage"
                  aria-selected="true"
                  >Réglages</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div
                class="tab-pane fade"
                id="nav-annonce"
                role="tabpanel"
                aria-labelledby="nav-annonce-tab"
              >
                {Informations liées aux annonces}
              </div>
              <div
                class="tab-pane fade"
                id="nav-favoris"
                role="tabpanel"
                aria-labelledby="nav-favoris-tab"
              >
                {Informations liées aux favoris}
              </div>
              <div
                class="tab-pane fade show active"
                id="nav-reglage"
                role="tabpanel"
                aria-labelledby="nav-reglage-tab"
              >
                <section id="profile">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
						
                        <form accept="" method="POST">
						 <input type="hidden" name="id_user" value="<?= $u->id_user ?>"/>
						 <input type="hidden" name="form_user" value="update_user"/>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <input type="text" name="prenom" value="<?= $u->prenom ?>" class="form-control p-4"  placeholder="Prénom"/>
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" name="nom" value="<?= $u->nom ?>" class="form-control p-4" placeholder="Nom"/>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <input type="email" name="email" value="<?= $u->email ?>" class="form-control p-4" placeholder="Adresse e-mail"/>
                            </div>
                            <div class="form-group col-md-6">
                              <input type="tel" name="telephone" value="<?= $u->telephone ?>" class="form-control p-4" placeholder="Téléphone mobile (optionnel)"/>
							  </div>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn form-control">MODIFIER</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
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
                <!-- if session open do not show  -->
                <li><a href="Connexion_part.php">particulier</a></li>
                <li><a href="connexion_pro.php">professionel</a></li>
                <!-- // -->
                <li><a href="contact.php">contact</a></li>
                <li><a href="#">plan du site</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-2">
            <div class="footer-social footer-menu2">
              <span>follow us</span>
              <ul>
                <li><a href="partenaires.php">partenaires</a></li>
              </ul>
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
