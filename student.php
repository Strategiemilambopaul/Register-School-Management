<?php
    require "Layourt/header.php";
    require "Controller/MainController.php";

    if(session_status() === PHP_SESSION_NONE) session_start();

    $request = new MainController();

    if(isset($_GET) and isset($_GET['eleve'])){
        $id = (int)$_GET['eleve'];
        $eleve = $request->eleveInformation($id);
        
       $documents = $request->getDocument($id);
    }
   
  

?>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Blog Grid</h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">Blog Grid</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


  
                        <div class="bg-primary">
                            <p class=" d-flex align-items-center text-light fw-bold justify-content-center rounded py-3" role="alert">
                                INFORMATION SUR L'ELEVE VEUILLEZ CONSULTER LES DIFFERENTS DOCUMENTS FOURNIS.
                               <center> <hr class="w-50 text-center text-light"></center>
                            </p>
                        
                        
                        <center>
                        <p class=" d-flex align-items-center text-light text-small justify-content-center rounded py-3">
                                Les documnents word ne seront pas directement lus dans le site, Veuillez le télécharger premièrement pour ainsi le traiter en local.
                                Mais pour le document Pdf, vous pouviez directement le consulter dans le site.
                            </p>
                        </center>
                        </div>

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="section-title section-title-sm position-relative pb-3 ">
                                    <h3 class="mb-0">Documents Fournis</h3>
                                </div>
                    <div class="g-5">
                    <?php

                        $ext = substr($eleve['certificat'], -3);

                        if($ext=="pdf"):?>
                            <p class="text-primary fw-bold my-2">Certificat Fournis</p>

                        <iframe src="<?=$eleve['certificat']?>" width="600" height="400" type="application/pdf"></iframe>

                        <?php else:?>
                        
                            <p class="text-primary fw-bold my-2">Certificat Fournis</p>
                            <a href="<?=$eleve['certificat']?>" class="btn btn-warning mb-2 mt-2"> <i class="fa fa-download text-primary"></i>  <?=$eleve['certificat']?></a>
                        <?php endif?>
                        <?php foreach($documents as $document):?>
                        <div class="col-md-12 wow slideInUp" data-wow-delay="0.1s">
                            <!-- <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="img/blog-1.jpg" alt="">
                                    <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a>
                                </div>
                                <div class="p-4">

                                </div>
                            </div> -->
                            <hr>
                           <?php

                            $ex = substr($document['doc_path'], -3);

                            if($ex=="pdf"):?>
                                <p class="text-primary fw-bold">Bulletins Pdf, à télécharger pour la lecture</p>
                           
                            <iframe src="<?=$document['doc_path']?>" width="600" height="400" type="application/pdf"></iframe>
                            
                            <?php else:?>
                               
                                <p class="text-primary fw-bold">Bulletins Word, à télécharger pour la lecture</p>
                                <a href="<?=$document['doc_path']?>" class="btn btn-warning mb-2 mt-2"> <i class="fa fa-download text-primary"></i>  <?=$document['doc_path']?></a>
                            <?php endif?>
                        </div>

                        <?php endforeach?>
                        
                    </div>
                </div>
                <!-- Blog list End -->
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                   
                    <!-- Search Form End -->
    
                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Informations sur l'élève</h3>
                        </div>
                      

                        <div class="link-animated d-flex flex-column justify-content-start">

                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Nom: <?= $eleve['nom']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Post Nom: <?= $eleve['postnom']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Pre Nom: <?= $eleve['prenom']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Date de Naissance : <?= $eleve['date_nais']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Lieu de Naissance<?= $eleve['lieu_nais']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Adresse : <?= $eleve['adresse']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Nationalité: <?= $eleve['nationalite']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Numéro: <?= $eleve['tel']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Responsable : <?= $eleve['responsable']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Option : <?= $eleve['options']?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Promotion : <?= $eleve['classe']?> Année</a>
                           
                        </div>
                    </div>
                    <!-- Category End -->
    
    
                  
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->


   

    <!-- Footer Start -->
<?php
    require "Layourt/footer.php"
?>