<?php
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
                    <h1 class="display-4 text-white animated zoomIn">Proffesseurs</h1>
                    <a href="index.php" class="h5 text-white">Acceuil</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="#" class="h5 text-white">Proffesseurs</a>
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


    <!-- Testimonial Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Proffesseurs</h5>
                <h1 class="mb-0">Profil de nos différents Enseignant</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="img/prof.jpg" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Roger bernard</h4>
                            <small class="text-uppercase">Enseignant</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        L'enseignant Roger est un enseignant dispensant tand des cours au sein de notre établissement avec des compétences énormes.
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="img/prof1.jpg" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Mbala Mbengi</h4>
                            <small class="text-uppercase">Enseignant</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                    L'enseignant Mbala est un enseignant dispensant tand des cours au sein de notre établissement avec des compétences énormes.
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="img/prof2.jpg" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Mayala Henoc</h4>
                            <small class="text-uppercase">Enseignant</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                    L'enseignant Mayala est un enseignant dispensant tand des cours au sein de notre établissement avec des compétences énormes.
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="img/prof3.jpg" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Mutombo Pascal</h4>
                            <small class="text-uppercase">Enseignant</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                    L'enseignant Mutombo est un enseignant dispensant tand des cours au sein de notre établissement avec des compétences énormes.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    
    

    <!-- Footer Start -->
<?php
    require "Layourt/footer.php"
?>