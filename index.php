<?php 
  require "Layourt/header.php";

  require "Controller/MainController.php";

  if(session_status() === PHP_SESSION_NONE) session_start();


  $request = new MainController();

  $options = $request->options();
  $classes = $request->classes();

?>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/el3.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Inscription En Ligne</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">La meilleur solution pour les inscriptions des élèves</h1>
                            <a href="#" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Acceuil</a>
                            <a href="contact.php" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/el2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Inscription En Ligne</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">La meilleur solution pour les inscriptions des élèves</h1>
                            <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Acceuil</a>
                            <a href="contact.php" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <a href="price.php">
                        <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                            <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                                <i class="fa fa-users text-primary"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="text-white mb-0">Formation proposée</h5>
                                <h1 class="text-white mb-0" data-toggle="counter-up"><?= count($options)?></h1>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                <a href="#class">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">Nombre des promotions</h5>
                            <h1 class="mb-0" data-toggle="counter-up"><?= count($classes)?></h1>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Année d'existences</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">20</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts Start -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Avant Propos</h5>
                        <h1 class="mb-0">Profitez des meilleurs formations pour vos enfants</h1>
                    </div>
                    <p class="mb-4">Rien ne plus important que d'offrir aux enfants des formations de qualitées qui leurs permettront d'offronter les mondes universitaires avec facilité. </p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Proffesseur Agréée</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Rénommer Nationale</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>24/7 Disponibilité</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Cours de qualité</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Appelez-nous pour les eventuelles questions</h5>
                            <h4 class="text-primary mb-0">+243 89 45 67 78</h4>
                        </div>
                    </div>
                    <a href="about.php" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">A propos</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/el.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Pour quoi nous choisir ?  </h5>
                <h1 class="mb-0">Nous offrons à vos enfants des formations dignes qui leur permettront d'accroître leurs compétenses du jour au jour.</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-cubes text-white"></i>
                            </div>
                            <h4>Cours</h4>
                            <p class="mb-0">Avec nos cours de haute qualité cela fait en sorte que nos élèves puissent se distinguer des autres possèdant de compétences tand pratique que théoriques.</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-award text-white"></i>
                            </div>
                            <h4>Options</h4>
                            <p class="mb-0">Les différentes options que nous regorgeons sont dispensées par des proffesseurs qualifiés</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="img/el3.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-users-cog text-white"></i>
                            </div>
                            <h4>Répitation</h4>
                            <p class="mb-0">L'on détient une répitation qui fait pas l'anonyme dans nos environnements respectifs et cela nous offre la credibilité envers les diffénts parents.</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <h4>24/7 Disponibilité</h4>
                            <p class="mb-0"> Nos portes sont ouvertes 24/7 à tous, afin de vous offrir la possibilité de poser toutes vos préoccupations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Start -->


    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5" id="class">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Nos différentes classes</h5>
                <h1 class="mb-0">Nous vous offrons des formations dans de classes ci-après: </h1>
            </div>
            <div class="row g-5">
                <?php foreach($classes as $classe):?>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="service-icon">
                                <i class="fa fa-shield-alt text-white"></i>
                            </div>
                            <h4 class="mb-3"><?= $classe['nom']?> Année.</h4>
                            <p class="m-0"><?= $classe['description']?></p>
                            <a class="btn btn-lg btn-primary rounded" href="">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach?>
               
               
        </div>
    </div>
    <!-- Service End -->



   
    
<?php
    require "Layourt/footer.php"
?>