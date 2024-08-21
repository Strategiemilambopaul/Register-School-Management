<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

 if(!isset($_SESSION) and !isset($_SESSION['user'])){
    header('Location: Auth/index.php');
}
   

    require "Controller/MainController.php";

    

    if(session_status() === PHP_SESSION_NONE) session_start();


    $request = new MainController();
   

    if (!empty($_POST) )
    {   
      $id_user = $_POST['id'];
      $subject = $_POST['sujet'];
      $content= $_POST['content'];
    $request->contact($id_user,$subject,$content);
    }

    require "Layourt/header.php";
    
?>
<style>
    .bg-header {
    background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)), url(img/el3.jpg) center center no-repeat;
    background-size: cover;
}
</style>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Contactez-Nous</h1>
                    <a href="index.php" class="h5 text-white">Acceuil</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="#" class="h5 text-white">Contact</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


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


    <!-- Contact Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Nous contactez</h5>
                <h1 class="mb-0">Contactez-nous en cas des besoins</h1>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Appelez nos services</h5>
                            <h4 class="text-primary mb-0">+243 89 45 67 78</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Notre Adresse Mail</h5>
                            <h4 class="text-primary mb-0">School34@gmail.com</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Localisation</h5>
                            <h6 class="text-primary mb-0">Congo, kinshasa/ Ligwala, croissement 24 N° 12</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form method="POST" action="">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="<?= $_SESSION['user']['nom']?>"  placeholder="<?= $_SESSION['user']['nom']?>" value="<?= $_SESSION['user']['nom']?>" style="height: 55px;" readonly>
                                <input type="hidden" class="form-control border-0 bg-light px-4" name="id"  placeholder="<?= $_SESSION['user']['nom']?>" value="<?= $_SESSION['user']['id']?>" style="height: 55px;" readonly>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 bg-light px-4" placeholder="<?= $_SESSION['user']['email']?>" name="email" style="height: 55px;" readonly>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="Subject" style="height: 55px;" name="sujet">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message" name="content"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!3m1!4b1!4m6!3m5!1s0x1a6a31458e76ee7f:0x5a961f85de2fd665!8m2!3d-4.3174464!4d15.2993463!16s%2Fm%2F0h3rqvl?hl=fr-FR&entry=ttu"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    
    

    <!-- Footer Start -->
<?php
    require "Layourt/footer.php"
?>