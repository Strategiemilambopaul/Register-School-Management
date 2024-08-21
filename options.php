<?php
    require "Layourt/header.php";

    require "Controller/MainController.php";

    $request = new MainController();

    $options = $request->options();
    $classes = $request->classes();


    
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
                    <h1 class="display-4 text-white animated zoomIn">Options</h1>
                    <a href="index.php" class="h5 text-white">Acceuil</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="#option" class="h5 text-white">Formations</a>
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


    <!-- Pricing Plan Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Formations offertes</h5>
                <h1 class="mb-0">Nous offrons aux enfants des formations en :</h1>
            </div>
            <div class="row g-0">
                
                <?php
                $array = ['light','white','light'];
                $img = ['sc.jpg','com.jpg','lit.jpg'];
                $time = ['0.1s','0.4s','0.7s'];
                foreach($options as $k => $option):?>
                    
                <div class="col-lg-4 wow slideInUp" data-wow-delay="<?=$time[$k]?>">
                    <div class="bg-<?=$array[$k]?> rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1"><?= $option['nom']?></h4>
                            
                        </div>
                        <div class="p-5 pt-0">
                           
                            <p>
                                <img src="img/<?=$img[$k]?>" alt="" class="rounded" height="250" width="200">
                            </p>
                            <a href="#option" class="btn btn-primary py-2 px-4 mt-4">Voir plus</a>
                        </div>
                    </div>
                </div>
                <?php endforeach?>
               
            </div>
        </div>
    </div>
    <!-- Pricing Plan End -->


    <!-- Quote Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase"  id="option">Formations</h5>
                        <h1 class="mb-0">Les différentes options organisées</h1>
                    </div>
                    <?php foreach($options as $option):?>
                    <div class="row gx-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"  data-wow-delay="0.6s"><i class="fa fa-book-open text-primary me-3"></i><?= $option['nom']?></h5>
                        </div>
                       
                    </div>
                    <p class="mb-4"><?= $option['description']?></p>
                   
                    <?php endforeach?>
                </div>
               
              
            </div>
        </div>
    </div>
    <!-- Quote End -->


   
    

    <!-- Footer Start -->
<?php
    require "Layourt/footer.php"
?>