<?php
 if(session_status() === PHP_SESSION_NONE) session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Startup - Startup Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Congo, kinshasa/ Ligwala, croissement 24 N° 12</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+243 89 45 67 78</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>School34@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fa-school me-2"></i>Online Book</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Acceuil</a>
                    <a href="about.php" class="nav-item nav-link">A propos</a>
                    <a href="info.php" class="nav-item nav-link">Info</a>
                    <?php if(!isset($_SESSION['user']['nom'])) :?>
                        <a href="#" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Inscription</a>
                    <?php else:?>
                        <a href="inscription.php" class="nav-item nav-link">Inscription</a>
                    <?php endif?>
                        
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="options.php" class="dropdown-item">Options</a>
                            <a href="dashboard.php" class="dropdown-item">Dashboard</a>
                            <a href="team.php" class="dropdown-item">Membres</a>
                            <a href="proffesseurs.php" class="dropdown-item">Proffesseurs</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <?php if(isset($_SESSION) and isset($_SESSION['user']['nom'])) :?>
                   <a href="inscription.php" class="btn btn-primary py-1 px-3 ms-3 mx-1">Bienvenu.e  <span class="fw-bold text-dark"><?= strtoupper($_SESSION['user']['nom'])?></span></a>

                   <a href="logout.php" class="btn btn-danger text-small">Logout</a>

                <?php else:?>
                <a href="Auth/index.php" class="btn btn-primary py-2 px-4 ms-3">Se connecter</a>
                <?php endif?>
            </div>
        </nav>


        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Information sur l'inscription de l'enfant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Soyez le bienvenu sur notre site.
        Afin, d'assurer la responsable d'inscription de votre enfant vous devez vous connecter dans le site pour avoir la possibilité de pouvoir inscrire votre enfant.
        Votre authentification , nous permettra de vous contactez en cas de besoin ainsi avoir certaines informations à propos des résultats de l'enfant après son inscription, si il a été admis ou pas.
        Merci, de vous <a href="Auth/index.php">connectez</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Compris</button>
       
      </div>
    </div>
  </div>
</div>